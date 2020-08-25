<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'publisher', 'category', 'author', 'registration_number', 'shelf', 'year'
    ];
}
