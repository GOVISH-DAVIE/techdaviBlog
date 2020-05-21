@extends('layouts.app')

@section('content')
       <div class="container">
        <h1>posts</h1>
        @if (count($posts) > 0)
           @foreach ($posts as $post)
           <div class="card row"  >
             <div class="row">
              <div class="col-sm-12 col-md-3"  style="height:inherit;background-image: url(/storage/cover_images/{{$post->cover_image}}); background-position: center;background-size: contain;background-repeat: no-repeat "> </div>
              <div class="  col-md-6">
                  <h5 class="card-title">
                      <a href="/posts/{{$post->id}}">    {{$post->title}}</a>
                  </h5>
                    <p class="card-text">{!! $post->body !!}</p>
                    <p class="small">written on {{ $post->created_at }} By {{$post->user->name}}</p>
              </div>
              <div class="col-sm-12 col-md-3">
                <a href="">view collection</a>
              </div>
             </div>
             </div> 
           @endforeach
           {{$posts->links()}}
           @else

           <h3>no posts..!</h3>
        @endif
       
       </div>
@endsection
 