@extends('layouts.layout')

@section('title', $movie->name)

@section('body-section')
<h1>O filmu</h1>
<p>Naziv: {{ $movie->name}}</p>

@endsection