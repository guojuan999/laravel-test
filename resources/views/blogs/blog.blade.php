@extends('layouts.app')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="min-height:40px;">
                   <div class="col-md-8">
                    Blogs
                   </div>
                    @if (Auth::user()->hasRole('admin'))
                    <div class="col-md-2"><a href="/blogs/add">Add New</a></div>
                    @endif
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Author</th>
                                  <th>Title</th>
                                  @if (Auth::user()->hasRole('admin'))
                                  <th>Action</th>
                                  @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <?php $user = $post->user()->firstorFail();?>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        <a href="/blogs/{{$post->getId()}}">{{$post->getTitle()}}</a>
                                    </td>
                                    @if (Auth::user()->hasRole('admin'))
                                    <td><a class="btn-link" href="/blogs/delete/{{$post->getId()}}">Delete</a>&nbsp;&nbsp;<a class="btn-link" href="/blogs/edit/{{$post->getId()}}">Edit</a></td>
                                    @endif
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
