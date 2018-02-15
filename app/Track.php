<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $primaryKey = 'TrackId';

    public function Album()
    {
      return $this->belongsTo('App\Album', 'AlbumId');
    }

    public function Genre()
    {
      return $this->belongsTo('App\Genre', 'GenreId');
    }

    public function MediaType()
    {
      return $this->belongsTo('App\MediaType', 'MediaTypeId');
    }
}
