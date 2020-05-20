@extends('layouts.app')

@section('content')
       <div class="container">
        <h1>posts</h1>
        @if (count($posts) > 0)
           @foreach ($posts as $post)
           <div class="card"  >
                <div class="card-body">
                 <h5 class="card-title">
                 <a href="/posts/{{$post->id}}">    {{$post->title}}</a>
               </h5>
                 <p class="card-text">{!! $post->body !!}</p>
                 <p class="small">written on {{ $post->created_at }} By {{$post->user->name}}</p>
               </div>
             </div> 
           @endforeach
           {{$posts->links()}}
           @else

           <h3>no posts..!</h3>
        @endif
       
       </div>
@endsection
 