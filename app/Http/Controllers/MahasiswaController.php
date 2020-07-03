<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;
use Tracker;
use Session;

class MahasiswaController extends Controller
{
	public function ReadMahasiswa()
	{
		// mengambil data dari table pegawai
    	$data_mahasiswa = DB::select('INSERT INTO tbmahasiswa (mahasiswa_nama) VALUES ("ajisaka")');
 
    	// mengirim data pegawai ke view index
    	return  view('MahasiswaData', ['data_mahasiswa'=>$data_mahasiswa]);
	}
}