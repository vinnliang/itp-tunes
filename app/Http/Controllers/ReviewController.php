<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

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

  public function saveReview($albumId, Request $request)
  {
    $validation = Validator::make(
    [
        'title' => $request->input('review-title'),
        'body' =>$request->input('review-body')
    ],
    [
        'title' => 'required',
        'body' => 'required|min:10'
    ]);
    if ($validation->passes())
    {
      DB::table('reviews')->insert(
      [
          'title' => $request->input('review-title'),
          'body' => $request->input('review-body'),
          'album_id' => $albumId,
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
      ]);

      return redirect('/albums/' . $albumId . '/reviews');
    }
    else
    {
      return redirect('/albums/' . $albumId. '/reviews/new')
      ->withInput()
      ->withErrors($validation);
    }
  }
}
