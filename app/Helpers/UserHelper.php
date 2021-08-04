<?php

namespace App\Helpers;

use \App\Helpers\ValidateHelper;
use Illuminate\Support\Facades\Auth;

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

		$userBook = $user->books->Where('id', $book_id);

		if(count($userBook) > 0)
			return ['success' => true];

		$user->books()->attach($book);

		return ['success' => true];
	}

	public static function addPassedTask($task_id)
	{
		$user = Auth::user();

		$task = Task::find($task_id);
		if(empty($task))
			return ['success' => false, 'msgs' => ['task not find']];

		$userTask = $user->tasks->Where('id', $task_id);

		if(count($userTask) > 0)
			return ['success' => true];

		$user->tasks()->attach($task);

		return ['success' => true];
	}
}