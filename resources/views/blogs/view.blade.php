@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{$post->getTitle()}}</h4>
                    <?php $user = $post->user()->firstorFail()?>
                    <small>Author : {{$user->name}}</small>
                </div>

                <div class="panel-body">
                    {{$post->getContent()}}
                    <p><a href="/blogs" class="btn-link">Go Back</a></p>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
