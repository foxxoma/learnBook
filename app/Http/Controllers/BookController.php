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

	public function getBooks(Request $request)
	{
		return BookHelper::getBooks($request->count, $request->page, $request->name, $request->sort);
	}

	public function getUserBooks(Request $request)
	{
		return BookHelper::getUserBooks($request->getPercent);
	}

	public function getPercent(Request $request)
	{
		return BookHelper::getPercent($request->book_id);
	}	
}
