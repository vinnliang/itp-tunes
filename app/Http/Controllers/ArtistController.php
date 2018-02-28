<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ArtistController extends Controller
{
  public function index()
  {
    $artists = DB::table('artists')
    ->select('ArtistId', 'artists.Name as Artist_Name')
    ->orderBy('name', 'asc')
    ->get();

    return view('artists',
    [
      'artists' => $artists
    ]);
  }

  public function showAlbums($id)
  {
    $artist = DB::table('artists')
    ->select('ArtistId', 'artists.Name as Artist_Name')
    ->where('artistId', '=', $id)
    ->first();

    $albums = DB::table('albums')
    ->where('ArtistId', '=', $id)
    ->get();

    return view('artist-albums',
    [
      'artist'=> $artist,
      'albums'=> $albums
    ]);
  }
}
