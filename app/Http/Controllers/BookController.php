<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Helpers\BookHelper;

use App\Book;

class BookController extends Controller
{
	public function add(Request $request)
	{
		return BookHelper::add($request->name, $request->language);
	}

	public function getUserBooks(Request $request)
	{
		return BookHelper::getUserBooks($request->getPercent);
	}
}
