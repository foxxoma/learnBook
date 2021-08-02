<?php

namespace App\Helpers;

use \App\Helpers\ValidateHelper;

use \App\Models\User;
use \App\Models\Book;
use \App\Models\Task;

class UserHelper
{
	public static function addBook($book_id)
	{
		$user = Auth::user();

		$book = Book::find($book_id);
		if(empty($book))
			return ['success' => false, 'msgs' => ['book not find']];

		$user->books()->attach($book);

		return ['success' => true];
	}

	public static function addTask($task_id)
	{
		$user = Auth::user();

		$task = Task::find($task_id);
		if(empty($task))
			return ['success' => false, 'msgs' => ['task not find']];

		$user->tasks()->attach($task);

		return ['success' => true];
	}
}