
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
<a href="/collections/create" class="btn btn-dark">create a Collection</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (count($posts) ==0)
                   <p> No posts.!</p>
                @else
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th></th>
                        <th>{{count($posts)}}</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr> 
                           <th>{{$post->title}}</th>
       <th><a href="/posts/{{$post->id}}/edit" class="btn btn-info"    >edit</a></th>
       <th>{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'post', 'class'=>'pull-right']) !!}
        {!! Form::hidden('_method', 'delete', ) !!}
       {!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}
       
       {!! Form::close() !!}</th>
                        </tr>
                    @endforeach
                </table>
                @endif
      
            </div>
        </div>
    </div>
</div>
@endsection
