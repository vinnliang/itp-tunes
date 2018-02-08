@extends('main-layout')

@section('title', 'Edit a Playlist')

@section('content')
<h1>Edit a Playlist</h1>

  @if ($errors->isNotEmpty())
      <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $message)
          {{$message}}
        @endforeach
      </div>
  @endif

  <form action="/playlists/{{$playlist->PlaylistId}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
        <h3>Current Playlist Name: {{$playlist->Name}}</h3>
      <label for="playlist">New Playlist Name</label>
      <input type="text" id="playlist" name="playlist" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection
