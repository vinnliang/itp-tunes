<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Playlist;


class PlaylistsController extends Controller
{
    public function index()
    {
      //$playlists = DB::table('playlists')->get();
      $playlists = Playlist::all();
      return view('playlist-list',
      [
        'playlists'=>$playlists
      ]);
    }

    public function show($playlistID)
    {
        //$playlist = DB::table('playlists')
        //->where('PlaylistId', '=', $playlistID)
        //->first();
        $playlist = Playlist::find($playlistID);

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
            //DB::table('playlists')->insert(
            //[
            //    'Name' => $request->input('playlist')
            //]);

            $playlist = new Playlist();
            $playlist->Name = $request->input('playlist');
            $playlist->save();

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
      //$playlist = DB::table('playlists')
      //->where('playlists.PlaylistId', '=', $id)
      //->first();
      $playlist = Playlist::find($id);

      return view('edit-playlist',
      [
        'playlist'=> $playlist
      ]);
    }

    public function delete($id) {
    	//DB::table('playlists')
    	//	->where('PlaylistId', '=', $id)
    	//	->delete();
      $playlist = Playlist::find($id);
      $playlist->delete();

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
          //DB::table('playlists')
          //->where('playlists.PlaylistId','=', $id)
          //->update(['Name' => $request->input('playlist')]);
          $playlist = Playlist::find($id);
          $playlist->Name = $request->input('playlist');
          $playlist->save();

          return redirect('/playlists');
      }
      else
      {
        return redirect('/playlists/' . $id . '/edit')
        ->withErrors($validation);
      }
    }
}
