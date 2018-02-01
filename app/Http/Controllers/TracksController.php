<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class TracksController extends Controller
{
  public function index()
  {
    $tracks = DB::table('tracks')
    ->select('tracks.Name as TrackName', 'albums.title as AlbumTitle', 'artists.Name as ArtistName', 'tracks.UnitPrice' )
    ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
    ->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId')
    ->get();
    //dd($invoices);
    return view('tracks',
    [
      'tracks' => $tracks
    ]);
  }

  public function showTracks(Request $request)
  {
    $genreName = $request->query('genres.Name');
    $query = $request->all();
    $trackItems = DB::table('tracks')
    ->select('tracks.Name as TrackName', 'albums.title as AlbumTitle', 'artists.Name as ArtistName', 'tracks.UnitPrice' )
    ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
    ->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId')
    ->join('genres', 'genres.GenreId', '=', 'tracks.GenreId')
    ->where('genres.Name', '=', $query)
    ->get();
    return view('tracksByGenre',
    [
      'trackItems' => $trackItems
    ]);
  }
}
