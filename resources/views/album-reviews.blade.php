@extends('main-layout')

@section('title', 'New Review')

@section('content')
</br>
<h2>Reviews for {{$album->Title}}</h2>
<ul>
  <table class="table">
    <tr>
      <th style="width: 25%">Review Title</th>
      <th>Review Body </th>
    </tr>
    @foreach($reviews as $review)
    <tr>
      <td>{{$review->title}}</td>
      <td>{{$review->body}}</td>
    </tr>
    @endforeach
  </table>
</ul>
</br></br></br>
<a href="/albums/{{$album->AlbumId}}/reviews/new"button type="button" class="btn btn-primary btn-lg btn-block"> Write a new review </button></a>
@endsection
