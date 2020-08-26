<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	protected $fillable = [
		'title', 'publisher_id', 'category_id', 'author_id', 'books_registrations_id', 'shelf_id', 'year'
	];

	protected $with = ['books_registration', 'author', 'category', 'publisher'];

	public function books_registration()
	{
		return $this->belongsTo('App\BooksRegistration');
	}

	public function author()
	{
		return $this->belongsTo('App\Author');
	}

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function publisher()
	{
		return $this->belongsTo('App\Publisher');
	}

	public function circulation()
	{
		return $this->hasMany('App\Circulation');
	}
}
