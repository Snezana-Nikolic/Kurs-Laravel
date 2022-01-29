@extends('layouts.layout')

@section('title' ,'Izmjena')
    
@section('body-section')

<h1 class="text-primary">Izmjena filma</h1>

<form action=" {{route('movies.update', $movie->id)}} " method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Izaberite naziv filma</label>
        <input type="text"
          class="form-control" name="name" aria-describedby="helpId" value={{$movie->name}}>
      
      </div>

      <div class="mb-3">
        <label for="photo" class="form-label"></label>
        <input type="file" class="form-control" name="photo" id="photo">
        <small id="emailHelpId" class="form-text text-muted">Help text</small>
      </div>
      <button type="submit" class="btn btn-success">Izmjeni film</button>
</form>


@endsection