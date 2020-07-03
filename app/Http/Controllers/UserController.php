<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;
use Tracker;
use Session;

class UserController extends Controller
{
	public function UserRead()
	{
		$data_user = DB::select('SELECT * FROM tb_user ORDER BY user_nickname ASC');
		return view('UserData', ['data_user'=>$data_user]);
	}

	public function UserInsert()
	{
		return view('UserInsert');
	}

	public function UserInsertProcess(Request $request)
	{
		$user_username = $request->input('user_username');
		$user_password = $request->input('user_password');
		$user_nickname = $request->input('user_nickname');
		$data_user=array('user_username'=>$user_username, 'user_password'=>$user_password, 'user_nickname'=>$user_nickname);
		DB::table('tb_user')->insert($data_user);
		return redirect()->to('UserData');
	}

	public function UserUpdate($user_id)
	{
		$data_user = DB::select("SELECT * FROM tb_user WHERE user_id = '$user_id'");
		return view('UserUpdate', ['data_user'=>$data_user]);
	}

	public function UserUpdateProcess(Request $request, $user_id)
	{
		$user_username = $request->input('user_username');
		$user_password = $request->input('user_password');
		$user_nickname = $request->input('user_nickname');
		DB::update("UPDATE tb_user SET user_username = '$user_username', user_password = '$user_password', user_nickname = '$user_nickname' WHERE user_id = '$user_id'");
		return redirect()->to('UserData');
	}

	public function UserDelete($user_id)
	{
		DB::delete("DELETE FROM tb_user WHERE user_id = '$user_id'");
		return redirect()->to('UserData');
	}
}