<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
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
			return ['success' => false, 'msgs' => ['save error']];
		else
			return ['success' => true, 'test' => $test];
	}

	public static function getTests($task_id)
	{
		if (empty($task_id))
			return ['success' => false, 'msgs' => ['empty task_id']];

		$tests = Test::Where('task_id', $task_id)->get();

		return ['success' => true, 'tests' => $tests];
	}

	public static function checkAnswer($id, $answer)
	{
		if (empty($id))
			return ['success' => false, 'msgs' => ['empty id']];

		if (empty($answer))
			return ['success' => false, 'msgs' => ['empty answer']];

		$test = Test::Where('id', $id)->first();

		if (empty($test))
			return ['success' => false, 'msgs' => ['test not find']];

		if($test['answer'] != $answer)
			return ['success' => false, 'msgs' => ['wrong answer']];
		else
			return ['success' => true, 'answer' => $answer];
	}
}