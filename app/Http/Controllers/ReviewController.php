<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ReviewController extends Controller
{
  public function showReviews($albumId)
  {
    $reviews = DB::table('reviews')
    ->select('title', 'body')
    ->where('album_id', '=', $albumId)
    ->get();

    $album = DB::table('albums')
    ->select('Title', 'AlbumId')
    ->where('AlbumId', '=', $albumId)
    ->first();

    //dd($album);
    return view('album-reviews',
    [
      'reviews'=> $reviews,
      'album' => $album
    ]);
  }

  public function newReview($albumId)
  {
    $album = DB::table('albums')
    ->select('Title', 'AlbumId')
    ->where('AlbumId', '=', $albumId)
    ->first();

    return view('new-review',
    [
      'album' => $album
    ]);
  }
}
