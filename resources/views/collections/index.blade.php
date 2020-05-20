@extends('layouts.app')

@section('content')

    @if (count($collections) >0)
        @foreach ($collections as $collection)
        <div class="card"  >
            <div class="card-body">
             <h5 class="card-title">
             <a href="/posts/{{$collection->id}}">    {{$collection->title}}</a>
           </h5>
             <p class="card-text">{!! $collection->description !!}</p>
             {{-- <p class="small">written on {{ $post->created_at }} By {{$post->user->name}}</p> --}}
           </div>
         </div>
        @endforeach
    @else
        no collection yet
    @endif 


@endsection