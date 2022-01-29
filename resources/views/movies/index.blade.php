@extends('layouts.layout')

@section('title' ,'Filmovi')
    
@section('body-section')

<h1>Lista filmova</h1>

<ul>
    @foreach ($movies as $movie)
    <a href="{{ route('movies.show', $movie->id)}} "><li>{{  $movie -> name }} </li>
    </a>
    @endforeach
    {{-- @if ($loop->last)
     
    @endif --}}

      <a href=" {{ route('movies.create')}} "> <li>Dodaj novi film</li></a>
        <h5 class="text-success mt-3">{{ session('msg')}} </h5>
   
  
</ul>
    
@endsection