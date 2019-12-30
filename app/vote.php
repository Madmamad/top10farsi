<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    //
    protected $fillable = ['list','user','thevote','item'];
}
