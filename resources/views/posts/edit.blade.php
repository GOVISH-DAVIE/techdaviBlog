@extends('layouts.app')

@section('content')
 
<div class="container">
  {{-- laravel collective --}}
  {!! Form::open(['action' => ['PostsController@update', $post->id], 'method'=>'post']) !!}
    
    <div class="form-group">
    {!! Form::label('title', 'Title') !!}
      {!! Form::text('title',$post->title, ['class'=>'form-control' , 'placeholder' =>'Title']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body',$post->body, ['id'=>'article-ckeditor','class'=>'form-control' , 'placeholder' =>'Body']) !!}
      </div>
      {!! Form::hidden('_method', 'PUT') !!}
{!! Form::submit('Submit', ['class' =>'btn btn-primary']) !!}

{!! Form::close() !!}
    {{-- <form action="/posts" method="post">

        <div class="form-group">
          <label for="Title">Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea type="text" name="body" class="form-control" id="body"></textarea>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div> --}}
  
@endsection