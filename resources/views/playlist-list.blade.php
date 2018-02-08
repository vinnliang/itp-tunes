@extends('main-layout')

@section('title', 'Playlists')

@section('content')
<a href="/playlists/new">Add Playlist</a>
<ul>
    @foreach($playlists as $playlist)
      <li>
        <div class="col-sm-4">
          <a href="/playlists/{{$playlist->PlaylistId}}">
              {{$playlist->Name}}
          </a>
        </div>

          <a href="/playlists/{{$playlist->PlaylistId}}/edit" class="btn btn-warning" role = "button">Edit</a>
          <a href="/playlists/{{$playlist->PlaylistId}}/delete"class="btn btn-danger" role = "button">Delete</a>

      </li>
    @endforeach
</ul>
@endsection
