<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('ArtistData');
// });

Route::get('/', 'LoginController@Login');
Route::get('Login', 'LoginController@Login');

Route::get('ArtistData', 'ArtistController@ArtistRead');
Route::get('ArtistInsert', 'ArtistController@ArtistInsert');
Route::post('ArtistInsertProcess','ArtistController@ArtistInsertProcess'); 
Route::get('ArtistUpdate/{artist_id}', 'ArtistController@ArtistUpdate');
Route::post('ArtistUpdateProcess/{artist_id}','ArtistController@ArtistUpdateProcess'); 
Route::get('ArtistDelete/{artist_id}', 'ArtistController@ArtistDelete');

Route::get('AlbumData', 'AlbumController@AlbumRead');
Route::get('AlbumInsert', 'AlbumController@AlbumInsert');
Route::post('AlbumInsertProcess','AlbumController@AlbumInsertProcess');
Route::get('AlbumUpdate/{album_id}', 'AlbumController@AlbumUpdate');
Route::post('AlbumUpdateProcess/{album_id}','AlbumController@AlbumUpdateProcess'); 
Route::get('AlbumDelete/{album_id}', 'AlbumController@AlbumDelete');

Route::get('TrackData', 'TrackController@TrackRead');
Route::get('TrackInsert', 'TrackController@TrackInsert');
Route::post('TrackInsertProcess','TrackController@TrackInsertProcess');
Route::get('TrackUpdate/{track_id}/{artist_id}/{track_name}','TrackController@TrackUpdate');
Route::get('TrackDelete/{track_id}/{artist_id}/{track_name}','TrackController@TrackDelete');
Route::post('TrackUpdateProcess/{track_id}/{artist_id}/{track_name}','TrackController@TrackUpdateProcess'); 

Route::get('UserData', 'UserController@UserRead');
Route::get('UserInsert', 'UserController@UserInsert');
Route::post('UserInsertProcess','UserController@UserInsertProcess'); 
Route::get('UserUpdate/{user_id}', 'UserController@UserUpdate');
Route::post('UserUpdateProcess/{user_id}','UserController@UserUpdateProcess'); 
Route::get('UserDelete/{user_id}', 'UserController@UserDelete');