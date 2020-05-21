@extends('layouts.app')

@section('content')

@include('includes.modals')
<div class="container bg-light shadow-sm  ">
  <div class="row">
      <div class="col-sm-12 col-md-6  d-flex justify-content-center">
        <img class="" src="/storage/cover_images/{{$collection->cover_image}}" height="200px" alt="">

      </div>
      <div class="col-sm-12 col-md-6   d-flex justify-content-center"> 
        <ul class="list-group  col-sm-6 "  style="  margin:none; padding: none" >
            <li class="list-group-item " style=" border:none ">  
              {{$collection->Subscribers}}   Subscribers
            </li>
            <li class="list-group-item" style="border:none">
                <!-- Button trigger modal --> 
               @if ($collection->user_id == Auth::user()->id )
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewPostShow">
                        Create Post
                    </button>
               @endif
                
                
         
            </li> 
            <li class="list-group-item" style="border: none !important"> 
            </li> 
          </ul> 

      </div>
  </div>

</div>



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