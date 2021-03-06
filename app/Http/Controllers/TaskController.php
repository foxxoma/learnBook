<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Helpers\TaskHelper;

use App\Task;

class TaskController extends Controller
{
	public function add(Request $request)
	{
		return TaskHelper::add($request->book_id, $request->title, $request->chapter, $request->difficulty, $request->content);
	}

	public function getTasks(Request $request)
	{
		return TaskHelper::getTasks($request->book_id);
	}

	public function getPassedTasks(Request $request)
	{
		return TaskHelper::getPassedTasks($request->book_id);
	}
}
