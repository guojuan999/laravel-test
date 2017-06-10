@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{$post->title}}</h4>
                    
                    <small>Author : {{$user->name}}</small>
                </div>

                <div class="panel-body">
                    {{$post->content}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
