<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	use HasFactory;

	protected $fillable = [
		'book_id',
		'title',
		'chapter',
		'difficulty',
		'content'
	];
	
	public function book()
	{
		return $this->hasMany(Book::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class);
	}
}
