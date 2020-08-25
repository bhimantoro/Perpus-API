<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name', 'address', 'email', 'telephone', 'fax'];
}
