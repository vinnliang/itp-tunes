@extends('main-layout')

@section('title', 'New Reviews')

@section('content')
</br>
<h2>Write a new review for {{$album->Title}}</h2>
</br>

@if ($errors->isNotEmpty())
    <div class="alert alert-danger" role="alert">
      @foreach($errors->all() as $message)
        {{$message}}
      @endforeach
    </div>
@endif

<form action="/albums/{{$album->AlbumId}}/reviews" method="post">
{{csrf_field()}}
    <div class="form-group">
        <div>
          <label for="review-title">Review Title:</label>
          <textarea class="form-control" rows="1" id="review-title" name="review-title"></textarea>
        </div></br>
        <div>
          <label for="review-body">Review Body:</label>
          <textarea class="form-control" rows="6" id="review-body" name="review-body"></textarea>
        </div>
    </div>
    </br></br></br>
    <button type="submit" class="btn btn-success btn-lg btn-block"> Submit Review </button></a>
</form>
@endsection
