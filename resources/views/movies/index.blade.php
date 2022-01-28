@extends('layouts.layout')

@section('title' ,'Filmovi')
    
@section('body-section')

<h1>Lista filmova</h1>

<ul>
    @foreach ($movies as $movie)
    <a href="{{ route('movies.show', $movie->id)}} "><li>{{  $movie -> name }} </li>
    </a>
    @if ($loop->last)
       <a href=" {{ route('movies.create')}} "> <li>Dodaj novi film</li></a>
    @endif

   
    @endforeach
</ul>
    
@endsection