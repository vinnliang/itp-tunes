<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
  protected $primaryKey = 'PlaylistId';
  public $timestamps = false;

  public function Tracks()
  {
    return $this->belongsToMany('App\Track', 'playlist_track', 'PlaylistId', 'TrackId');
  }
}
