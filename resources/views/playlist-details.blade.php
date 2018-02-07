@extends('main-layout')

@section('title', $playlist->Name)

@section('content')
<h1>{{$playlist->Name}}</h1>
<h3>Tracks</h3>
<ul>
    @foreach($tracks as $track)
      <li>
          {{$track->Name}}
      </li>
    @endforeach
@endsection
