<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
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
		$user = Auth::user();

		if (empty($book_id))
			return ['success' => false, 'msgs' => ['empty book_id']];

		$tasks = Task::Where('book_id', $book_id)
		->leftJoin('task_user', function ($join)  use ($user)
		{
			$join->on('task_user.task_id', '=', 'tasks.id');
			$join->Where('task_user.user_id', '=', $user->id);
		})
		->groupBy('tasks.id')
		->select(['tasks.*', DB::raw('COUNT(task_user.user_id) as is_subscribed')])
		->get();

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