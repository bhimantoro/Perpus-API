<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
	protected $fillable = ['code', 'location'];

	public function registration()
	{
		return $this->hasMany('App\BooksRegistration');
	}
}
