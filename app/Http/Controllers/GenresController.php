<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use DB;

class GenresController extends Controller
{
  public function index()
  {
    // $genres = DB::table('genres')
    // ->get();
    //dd($invoices);
    $genres = Genre::all();

    return view('genres',
    [
      'genres' => $genres
    ]);
  }
}
