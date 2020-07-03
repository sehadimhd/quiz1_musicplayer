<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;
use Tracker;
use Session;

class AlbumController extends Controller
{
	public function AlbumRead()
	{
		$data_album = DB::select("SELECT tb_artist.artist_name, tb_album.album_id, tb_album.album_name FROM tb_album JOIN tb_artist ON tb_artist.artist_id = tb_album.artist_id ORDER BY tb_artist.artist_name ASC");
		return view('AlbumData', ['data_album'=>$data_album]);
	}

	public function AlbumInsert()
	{
		$data_artist = DB::select("SELECT * FROM tb_artist ORDER BY artist_name ASC");
		return view('AlbumInsert', ['data_artist'=>$data_artist]);
	}
	
	public function AlbumInsertProcess(Request $request)
	{
		$artist_id = $request->input('artist_id');
		$album_name = $request->input('album_name');
		$data_album=array('artist_id'=>$artist_id, 'album_name'=>$album_name);
		DB::table('tb_album')->insert($data_album);
		return redirect()->to('AlbumData');
	}

	public function AlbumUpdate($album_id)
	{
		$data_artist = DB::select("SELECT * FROM tb_artist ORDER BY artist_name ASC");
		$data_album = DB::select("SELECT tb_artist.artist_name, tb_album.album_id, tb_album.album_name, tb_album.artist_id FROM tb_album JOIN tb_artist ON tb_artist.artist_id = tb_album.artist_id WHERE album_id = '$album_id'");
		return view('AlbumUpdate', ['data_artist'=>$data_artist, 'data_album'=>$data_album]);
	}

	public function AlbumUpdateProcess(Request $request, $album_id)
	{
		$artist_id = $request->input('artist_id');
		$album_name = $request->input('album_name');
		DB::update("UPDATE tb_album SET artist_id = '$artist_id', album_name='$album_name' WHERE album_id = '$album_id'");
		return redirect()->to('/AlbumData');
	}

	public function AlbumDelete($album_id)
	{
		DB::delete("DELETE FROM tb_album WHERE album_id = '$album_id'");
		return redirect()->to('AlbumData');
	}
}