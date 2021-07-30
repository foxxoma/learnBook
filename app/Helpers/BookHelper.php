<?php

namespace App\Helpers;

use \App\Models\Book;
use \App\Models\User;

class BookHelper
{
	public static function add($name, $language)
	{
		$bookData = [
			'name' => $name,
			'language' => $language,
		];

		$errors = ValidateHelper::checkEmpty($bookData);
		if (!empty($errors))
			return ['success' => false, 'msgs' => $errors];

		$book = Book::create($bookData);

		if(!$book->save())
			return ['success' => false, 'msg' => 'save error'];
		else
			return ['success' => true, 'book' => $book];
	}

	public static function getBooks(int $count = 10, int $page = 1, string $name = '', string $sort = 'asc')
	{
		$skip = --$page * $count;

		$books = Book::Where('name', 'like', $name)
			->sortBy('name', $sort)
			->skip($skip)
			->take($count)
			->get();

		return ['success' => true, 'books' => $books];
	}

	public static function getUserBooks(int $user_id = null, bool $getPercent = true)
	{
		if (empty($user_id))
			return ['success' => false, 'msg' => 'empty user_id'];

		$skip = --$page * $count;

		$user = User::Where('id', $user_id)->first();

		if (empty($user))
			return ['success' => false, 'msg' => 'user not find'];

		$books = $user->books->get();

		if($getPercent)


		return ['success' => true, 'books' => $books];
	}

	public static function getPassed(int $user_id = null, int $book_id = null)
	{
		if (empty($user_id))
			return ['success' => false, 'msg' => 'empty user_id'];

		if (empty($book_id))
			return ['success' => false, 'msg' => 'empty book_id'];

		$user = User::Where('id', $user_id)->first();

		if (empty($user))
			return ['success' => false, 'msg' => 'user not find'];

		$tasks = Book::Where('book_id', $book_id)->get();
		$user_tasks = $user->tasks->Where('books', $book_id)->get();

		$passed = count($user_tasks) / (count($tasks) / 100);

		return ['success' => true, 'passed' => $passed];
	}
}