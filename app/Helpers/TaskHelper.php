<?php

namespace App\Helpers;

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
}