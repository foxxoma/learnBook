<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Helpers\UserHelper;

class UserController extends Controller
{
    public function addBook(Request $request)
    {
        return UserHelper::addBook($request->book_id);
    }

    public function addTask(Request $request)
    {
        return UserHelper::addTask($request->task_id);
    }
}
