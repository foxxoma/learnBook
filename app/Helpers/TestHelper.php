<?php

namespace App\Helpers;

use \App\Helpers\ValidateHelper;

use \App\Models\Test;

class TestHelper
{
	public static function add($task_id, $answer, $content)
	{
		$testData = [
			'task_id' => $task_id,
			'answer' => $answer,
			'content' => $content,
		];

		$errors = ValidateHelper::checkEmpty($testData);
		if (!empty($errors))
			return ['success' => false, 'msgs' => $errors];

		$test = Test::create($testData);

		if(!$test->save())
			return ['success' => false, 'msg' => 'save error'];
		else
			return ['success' => true, 'book' => $book];
	}
}