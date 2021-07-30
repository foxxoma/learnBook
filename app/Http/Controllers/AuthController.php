<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Helpers\UserHelper;

use App\User;

class AuthController extends Controller
{
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'api_token' => Str::random(60),
		]);
	}
}
