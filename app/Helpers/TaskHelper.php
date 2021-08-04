<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use \App\Helpers\ValidateHelper;

use \App\Models\Task;

class TaskHelper
{
	public static function add($book_id, $title, $chapter, $difficulty, $content)
	{
		$taskData = [
			'book_id' => $book_id,
			'title' => $title,
			'chapter' => $chapter,
			'difficulty' => $difficulty,
			'content' => $content
		];

		$errors = ValidateHelper::checkEmpty($taskData);
		if (!empty($errors))
			return ['success' => false, 'msgs' => $errors];

		$task = Task::create($taskData);

		if(!$task->save())
			return ['success' => false, 'msga' => ['save error']];
		else
			return ['success' => true, 'book' => $task];
	}

	public static function getTasks($book_id)
	{
		if (empty($book_id))
			return ['success' => false, 'msgs' => ['empty book_id']];

		$tasks = Task::Where('book_id', $book_id)->get();

		return ['success' => true, 'tasks' => $tasks];
	}

	public static function getPassedTasks($book_id)
	{
		$user = Auth::user();

		if (empty($book_id))
			return ['success' => false, 'msgs' => ['empty book_id']];

		$passedTasks = $user->tasks->Where('book_id', $book_id);

		return ['success' => true, 'tasks' => $passedTasks];
	}
}