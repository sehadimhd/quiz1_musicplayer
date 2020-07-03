<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;
use Tracker;
use Session;

class TrackController extends Controller
{
	public function TrackRead()
	{
		$data_track = DB::select("SELECT tb_track.track_id, tb_track.album_id, tb_artist.artist_name, tb_album.artist_id, tb_track.track_name, tb_album.album_name FROM tb_track JOIN tb_album ON tb_track.album_id = tb_album.album_id JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id ORDER BY artist_name");
		return view('TrackData', ['data_track'=>$data_track]);
	}

	public function TrackInsert()
	{
		$data_album = DB::select("SELECT tb_album.album_id, tb_album.artist_id, tb_artist.artist_name, tb_album.album_name FROM tb_album JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id ORDER BY tb_artist.artist_name ASC, tb_album.album_name ASC");
		return view('TrackInsert', ['data_album'=>$data_album]);
	}

	public function TrackInsertProcess(Request $request)
	{
		$artist_id = "0";
		$album_id = $request->input('album_id');
		$data_album = DB::select("SELECT * FROM tb_album WHERE album_id = '$album_id'");
		$artist_id = $data_album[0]->artist_id;
		$track_name = $request->input('track_name');
		$track_file = $request->file('track_file')->getPathName();
		if (!file_exists('bigdata')) 
		{
    		mkdir('bigdata');
		}
		if (!file_exists('bigdata/data'.$artist_id)) 
		{
    		mkdir('bigdata/data'.$artist_id);
		}
		$dir_upload = 'bigdata/data'.$artist_id.'/';
		move_uploaded_file($track_file, $dir_upload.$track_name.'.mp3');
		$data_track=array('album_id'=>$album_id, 'track_name'=>$track_name);
		DB::table('tb_track')->insert($data_track);
		return redirect()->to('TrackData');
	}

	public function TrackUpdate($track_id, $artist_id, $track_name)
	{
		$data_track = DB::select("SELECT tb_track.track_id, tb_track.album_id, tb_artist.artist_name, tb_album.artist_id, tb_track.track_name, tb_album.album_name FROM tb_track JOIN tb_album ON tb_track.album_id = tb_album.album_id JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id WHERE track_id = '$track_id' ORDER BY artist_name");
		$data_album = DB::select("SELECT tb_album.album_id, tb_album.artist_id, tb_artist.artist_name, tb_album.album_name FROM tb_album JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id ORDER BY tb_artist.artist_name ASC, tb_album.album_name ASC");
		return view('TrackUpdate', ['data_album'=>$data_album, 'data_track'=>$data_track]);
	}


	public function TrackUpdateProcess(Request $request, $track_id, $artist_id, $track_name)
	{
		if (file_exists('bigdata/data'.$artist_id.'/'.$track_name.'.mp3')) 
		{
		unlink('bigdata/data'.$artist_id.'/'.$track_name.'.mp3');
		}
		
		$artist_id = "0";
		$album_id = $request->input('album_id');
		$data_album = DB::select("SELECT * FROM tb_album WHERE album_id = '$album_id'");
		$artist_id = $data_album[0]->artist_id;
		$track_name = $request->input('track_name');
		$track_file = $request->file('track_file')->getPathName();
		if (!file_exists('bigdata')) 
		{
    		mkdir('bigdata');
		}
		if (!file_exists('bigdata/data'.$artist_id)) 
		{
    		mkdir('bigdata/data'.$artist_id);
		}
		$dir_upload = 'bigdata/data'.$artist_id.'/';
		move_uploaded_file($track_file, $dir_upload.$track_name.'.mp3');
		$data_track=array('album_id'=>$album_id, 'track_name'=>$track_name);
		DB::update("UPDATE tb_track SET album_id = '$album_id', track_name = '$track_name' WHERE track_id = '$track_id'");
		return redirect()->to('TrackData');
	}

	public function TrackDelete($track_id, $artist_id, $track_name)
	{
		if (file_exists('bigdata/data'.$artist_id.'/'.$track_name.'.mp3')) 
		{
		unlink('bigdata/data'.$artist_id.'/'.$track_name.'.mp3');
		}
		DB::delete("DELETE FROM tb_track WHERE track_id = '$track_id'");
		return redirect()->to('TrackData');
	}
}