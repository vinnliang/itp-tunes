<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $primaryKey = 'GenreId';
    public $timestamps = false;

    public function Tracks()
    {
      return $this->hasMany('App\Track', 'GenreId');
    }
}
