<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;
use Tracker;
use Session;

class loginController extends Controller
{

	public function Login()
	{
		return view('/Login');
	}
}