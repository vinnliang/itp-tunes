@extends('main-layout')

@section('title', 'Artists')

@section('content')
</br>
<h2>Artists</h2>
<ul>
  <table class="table">
    <tr>
      <th>Artist Name</th>
    </tr>
    @foreach($artists as $artist)
    <tr>
      <td><a href="/artists/{{$artist->ArtistId}}/albums/">{{$artist->Artist_Name}}</a></td>
    </tr>
    @endforeach
  </table>
</ul>
@endsection
