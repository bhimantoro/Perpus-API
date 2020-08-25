<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circulation extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'code', 'book_code', 'entry_date', 'out_date', 'status', 'penalty'
    ];
}
