<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	use HasFactory;

	protected $fillable = [
		'task_id',
		'answer',
		'content',
	];

	public function task()
	{
		return $this->hasMany(Task::class);
	}
}
