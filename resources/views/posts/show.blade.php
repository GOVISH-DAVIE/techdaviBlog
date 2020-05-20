@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card"  >
        <div class="card-body">
         <h5 class="card-title">
         <a href="/posts/{{$post->id}}">    {{$post->title}}</a>
       
        </h5>
          <p class="card-text">{!!$post->body!!}</p>
@if (!Auth::guest())
@if (Auth::user()->id == $post->user_id)
<p>      <a href="/posts/{{$post->id}}/edit" class="btn btn-info">edit</a>         
  {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'post', 'class'=>'pull-right']) !!}
  {!! Form::hidden('_method', 'delete', ) !!}
 {!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}
 
 {!! Form::close() !!}<p class="small">written on {{ $post->created_at }} By {{$post->user->name}}</p>

@endif
    
@endif


</p>       </div>
     </div> 
</div>
        
@endsection
 