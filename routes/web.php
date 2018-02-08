<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoices', 'InvoicesController@index');

Route::get('/invoices/{id}', 'InvoicesController@showInvoice');

Route::get('/genres', 'GenresController@index');

Route::get('/tracks', 'TracksController@index');

Route::get('tracks', 'TracksController@showTracks');

Route::get('/playlists', 'PlaylistsController@index');

Route::get('/playlists/new', 'PlaylistsController@create');

Route::get('/playlists/{id}', 'PlaylistsController@show');

Route::get('/playlists/{id}/edit', 'PlaylistsController@edit');

Route::get('/playlists/{id}/delete', 'PlaylistsController@delete');

Route::post('/playlists/{id}', 'PlaylistsController@saveChanges');

Route::post('/playlists', 'PlaylistsController@store');


//Route::get('/tracks?genre={name}', 'TracksController@showTracks');
