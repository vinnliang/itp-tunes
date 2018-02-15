<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Track;
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
//$trackItems = Genre::where('Name', $request->query('genre'))->find()->Tracks;
  public function showTracks(Request $request)
  {
    // $genreName = $request->query('genres.Name');
    // $query = $request->all();
    // $trackItems = DB::table('tracks')
    // ->select('tracks.Name as TrackName', 'albums.title as AlbumTitle', 'artists.Name as ArtistName', 'tracks.UnitPrice' )
    // ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
    // ->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId')
    // ->join('genres', 'genres.GenreId', '=', 'tracks.GenreId')
    // ->where('genres.Name', '=', $query)
    // ->get();
    if (is_null($request->query('genre')))
    {
      $trackItems = Track::inRandomOrder()->take(100)->get();
    }
    else
    {
      $trackItems = Genre::where('Name', $request->query('genre'))->first()->Tracks;
    }
      return view('tracksByGenre',
    [
      'trackItems' => $trackItems
    ]);
  }
}
