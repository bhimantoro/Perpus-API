<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BooksRegistration extends Model
{
	protected $fillable = ['registration_number', 'shelf_id'];

	protected $with = ['shelf'];

	public function shelf()
	{
		return $this->belongsTo('App\Shelf');
	}

	public function book()
	{
		return $this->hasOne('App\Book');
	}
}
