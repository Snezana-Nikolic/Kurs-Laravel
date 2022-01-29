@extends('layouts.layout')
{{-- //drugi nacin --}}
@section('title', 'Glumac')
@section('body-section')
<p>Ime i prezime: {{$actor->first_name}} {{$actor->last_name}}</p>
<p>Email: {{$actor->email}}</p>
<p>Pol: 
    @switch($actor->gener)
        @case('man')
            Muški
            @break
            @case('woman')
            Ženski
            @break
        @default
            Nema pol
    @endswitch
</p>




{{-- suprotno od if --}}
@unless ($actor->number_oscars == 0)  
Broj osvojenih oskara: <p> {{$actor->number_oscars}} </p>

@endunless


@endsection