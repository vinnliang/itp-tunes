@extends('main-layout')

@section('title', 'Album Reviews')

@section('content')
</br>
<h2>Write a new review for {{$album->Title}}</h2>
</br>
<div class="form-group">
    <div>
      <label for="review-title">Review Title:</label>
      <textarea class="form-control" rows="1" id="review-title"></textarea>
    </div></br>
    <div>
      <label for="review-body">Review Body:</label>
      <textarea class="form-control" rows="6" id="review-body"></textarea>
    </div>
</div>
</br></br></br>
<a href="/albums/{{$album->AlbumId}}/reviews/new"button type="button" class="btn btn-success btn-lg btn-block"> Submit Review </button></a>
@endsection
