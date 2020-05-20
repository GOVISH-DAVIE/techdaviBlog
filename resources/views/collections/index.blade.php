@extends('layouts.app')

@section('content')

    @if (count($collections) >0)
        @foreach ($collections as $collection)
        <div class="card"  >
            <div class="card-body  " style="height: 150px"> 
              <div class="row no-gutters">
                <div class="col-sm-12 col-md-4 " style="height:100px;background-image: url(/storage/cover_images/{{$collection->cover_image}}); background-position: center;background-size: contain;background-repeat: no-repeat "> 
                </div>
                <br clear="left">

                {{-- decription for the collection --}}
                <div class="col-sm-12 col-md-6">
                  
                  <ul class="list-group list-group-flush" >
                    <li class="list-group-item" style="border: none !important">
                      <h5 class="card-title">{{$collection->name}} </h5>
                    </li>
                    <li class="list-group-item">{!! $collection->description !!}</li> 
                  </ul> 
                 </div>

                 {{--
                   collection action
                   --}}
                   <div class="col-sm-12 col-md-2">
                  
                    <ul class="list-group list-group-flush" >
                      <li class="list-group-item" style="border: none !important"> 
                        <a href=""> View Post</a>
                      </li>
                      <li class="list-group-item" style="border: none !important">
                        <a href="">Delete</a>
                      </li>
                    

                    </ul> 
                   </div>
  
              </div>
          
              {{-- <p class="small">written on {{ $post->created_at }} By {{$post->user->name}}</p> --}}
           </div>
         </div>
        @endforeach
    @else
        no collection yet
    @endif 


@endsection