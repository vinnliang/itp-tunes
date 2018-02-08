<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;


class PlaylistsController extends Controller
{
    public function index()
    {
      $playlists = DB::table('playlists')->get();
      return view('playlist-list',
      [
        'playlists'=>$playlists
      ]);
    }

    public function show($playlistID)
    {
        $playlist = DB::table('playlists')
        ->where('PlaylistId', '=', $playlistID)
        ->first();

        $tracks = DB::table('playlist_track')
        ->join('tracks', 'tracks.TrackId', '=', 'playlist_track.TrackId')
        ->where('PlaylistId', '=', $playlistID)
        ->get();

      return view('playlist-details',
      [
        'playlist'=> $playlist,
        'tracks'=> $tracks
      ]);
    }

    public function create()
    {
      return view('create-playlist');
    }

    public function store(Request $request)
    {
        $validation = Validator::make(
          [
              'playlistName' => $request->input('playlist')
          ],
          [
              'playlistName' => 'required|min:3'
          ]);

        if ($validation->passes())
        {
            DB::table('playlists')->insert(
            [
                'Name' => $request->input('playlist')
            ]);

            return redirect('/playlists');
        }
        else
        {
          return redirect('/playlists/new')
          ->withInput()
          ->withErrors($validation);
        }
    }

    public function edit($id)
    {
      $playlist = DB::table('playlists')
      ->where('playlists.PlaylistId', '=', $id)
      ->first();
      return view('edit-playlist',
      [
        'playlist'=> $playlist
      ]);
    }

    public function delete($id) {
    	DB::table('playlists')
    		->where('PlaylistId', '=', $id)
    		->delete();
    	return redirect('/playlists');
    }

    public function saveChanges($id, Request $request)
    {
      $validation = Validator::make(
        [
            'playlistName' => $request->input('playlist')
        ],
        [
            'playlistName' => 'required|min:3'
        ]);

      if ($validation->passes())
      {
          DB::table('playlists')
          ->where('playlists.PlaylistId','=', $id)
          ->update(['Name' => $request->input('playlist')]);
          return redirect('/playlists');
      }
      else
      {
        return redirect('/playlists/' . $id . '/edit')
        ->withErrors($validation);
      }
    }
}
