<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use \App\Helpers\UserHelper;

use App\Models\User;

class AuthController extends Controller
{
	protected function create(Request $request)
	{
		return User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => Hash::make($request['password']),
			'api_token' => Str::random(60),
		]);
	}
}
