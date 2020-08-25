<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BooksStock extends Model
{
    protected $fillable = ['book_id', 'total'];
}
