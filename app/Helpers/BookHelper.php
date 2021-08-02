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
			return ['success' => false, 'msgs' => ['save error']];
		else
			return ['success' => true, 'book' => $book];
	}

	public static function getBooks($count, $page, $name, $sort)
	{
		$data = [
			'count' => $count,
			'page' => $page,
		];

		$errors = ValidateHelper::checkEmpty($data);
		if (!empty($errors))
			return ['success' => false, 'msgs' => $errors]

		$skip = --$page * $count;

		$books = Book::Where('name', 'like', $name)
			->sortBy('name', $sort?$sort:'asc')
			->skip($skip)
			->take($count)
			->get();

		return ['success' => true, 'books' => $books];
	}

	public static function getUserBooks($getPercent)
	{
		$user = Auth::user();
		$books = $user->books->get();

		if($getPercent)
			foreach($books as &$book)
				$book['passed'] = $this->getPassed($book['id'])['passed'];

		return ['success' => true, 'books' => $books];
	}

	public static function getPassed($book_id)
	{
		$user = Auth::user();

		if (empty($book_id))
			return ['success' => false, 'msgs' => ['empty book_id']];

		$tasks = Book::Where('book_id', $book_id)->get();
		$user_tasks = $user->tasks->Where('books', $book_id)->get();

		$passed = count($user_tasks) / (count($tasks) / 100);

		return ['success' => true, 'passed' => $passed];
	}
}