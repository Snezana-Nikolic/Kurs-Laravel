@extends('layouts.layout')

@section('title', $movie->name)

@section('body-section')
<h1>O filmu</h1>
<p>Naziv: {{ $movie->name}}</p>
<form action="{{ route('movies.destroy', $movie->id)}} " method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Obrisi film</button>
</form>

<a href="{{ route('movies.edit', $movie->id)}} ">Izmijeni film</a>
<h4 class="text-success mt-3">Glumci iz filma</h4>
<div class="mt-3">
    <div class="list-group">
        @foreach ($movie->actors as $actor)
            <a href=" {{route('actors.show', $actor->id )}} " class="list-group-item list-group-item-action">
                {{ $actor->first_name }}
                {{ $actor->last_name }}</a>
        @endforeach

    </div>
    
    <p class="text-success">
        {{$actor->first_name}} {{$actor->last_name}}
    </p>
</div>
<h5 class="text-success mt-3">{{ session('msg')}} </h5>
@endsection