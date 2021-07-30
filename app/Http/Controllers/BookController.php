<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Helpers\BookHelper;

use App\Book;

class BookController extends Controller
{
	public function addBook(Request $request)
	{
		return BookHelper::addBook($request->name, $request->language);
	}
}
