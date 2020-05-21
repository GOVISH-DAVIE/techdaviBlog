@extends('layouts.app')

@section('content')

    @if (count($collections) >0)
        @foreach ($collections as $collection)
        <div class="card  shadow-sm"  > 
              <div class="row  "card-body" style="   " >
                <div class="col-sm-12 col-md-2 " style="height:inherit;background-image: url(/storage/cover_images/{{$collection->cover_image}}); background-position: center;background-size: contain;background-repeat: no-repeat "> 
                </div> 

                {{-- decription for the collection --}}
                <div class="col-sm-12 col-md-8">
                  
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
                   <div class="col-sm-12 col-md-2" style="  margin:none; padding: none">
                  
                    <ul class="list-group "  style="  margin:none; padding: none" >
                      <li class="list-group-item" style="border: none !important; margin:none; padding:none"> 
                        <a href="/collections/{{$collection->id}}" class="btn btn-light"> View Post</a>
                      </li>
                      <li class="list-group-item" style="border: none !important">
                        <a href="/collections/{{$collection->id}}/edit" class=" btn btn-warning">Edit</a>
                      </li> 
                      <li class="list-group-item" style="border: none !important">
                     @if (!Auth::guest())
                     
                          @if ($collection->user_id == Auth::user()->id)
                          {!! Form::open(['action' => ['PostsController@destroy', $collection->id], 'method'=>'post', 'class'=>'pull-right']) !!}
                          {!! Form::hidden('_method', 'delete', ) !!}
                          {!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}
                          
                          {!! Form::close() !!} 
                      @endif
                         
                     @endif
                    
                      </li> 
                    </ul> 
                   </div>
  
              </div>
          
              {{-- <p class="small">written on {{ $post->created_at }} By {{$post->user->name}}</p> --}}
          
         </div>
        @endforeach
    @else
        no collection yet
    @endif 


@endsection