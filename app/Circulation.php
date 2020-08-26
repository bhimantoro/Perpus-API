<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circulation extends Model
{
	protected $fillable = [
		'user_id', 'book_id', 'code', 'book_code', 'entry_date', 'out_date', 'status', 'penalty'
	];

	protected $with = ['books', 'users'];

	public function books()
	{
		return $this->belongsToMany('App\Book', 'books');
	}

	public function users()
	{
		return $this->belongsToMany('App\User', 'users');
	}
}
