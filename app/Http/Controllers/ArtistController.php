<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;
use Tracker;
use Session;

class ArtistController extends Controller
{
	public function ArtistRead()
	{
		$data_artist = DB::select('SELECT * FROM tb_artist ORDER BY artist_name ASC');
		return view('ArtistData', ['data_artist'=>$data_artist]);
	}

	public function ArtistInsert()
	{
		return view('ArtistInsert');
	}

	public function ArtistInsertProcess(Request $request)
	{
		$artist_name = $request->input('artist_name');
		$data_artist=array('artist_name'=>$artist_name);
		DB::table('tb_artist')->insert($data_artist);
		return redirect()->to('ArtistData');
	}

	public function ArtistUpdate($artist_id)
	{
		$data_artist = DB::select("SELECT * FROM tb_artist WHERE artist_id = '$artist_id'");
		return view('ArtistUpdate', ['data_artist'=>$data_artist]);
	}

	public function ArtistUpdateProcess(Request $request, $artist_id)
	{
		$artist_name = $request->input('artist_name');
		DB::update("UPDATE tb_artist SET artist_name = '$artist_name' WHERE artist_id = '$artist_id'");
		return redirect()->to('ArtistData');
	}

	public function ArtistDelete($artist_id)
	{
		DB::delete("DELETE FROM tb_artist WHERE artist_id = '$artist_id'");
		return redirect()->to('ArtistData');
	}
}