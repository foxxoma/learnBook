<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Helpers\TestHelper;

use App\Test;

class TestController extends Controller
{
	public function add(Request $request)
	{
		return TestHelper::add($request->task_id, $request->answer, $request->content);
	}

	public function getTests(Request $request)
	{
		return TestHelper::getTests($request->task_id);
	}

	public function checkAnswer(Request $request)
	{
		return TestHelper::checkAnswer($request->id, $request->answer);
	}
}
