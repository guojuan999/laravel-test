@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form class="form-horizontal" role="form" method="POST" action="/blogs/save">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$post->id}}" />
                   
                <div class="panel-heading">
                    <h2>
                    @if ($post->id)
                      Edit
                    @else
                      Add
                    @endif
                    Blog
                    </h2>
                </div>

                <div class="panel-body">
                    <label>Blog Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}" />
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                    <label>Blog Content</label>
                    <textarea class="form-control" name="content">{{$post->content}}</textarea>
                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                
                <input type="submit" class="btn center-block" name="submit" value="Save" />
                
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
