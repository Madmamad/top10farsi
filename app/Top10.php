<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Top10 extends Model
{
    //
    protected $fillable = ['title','description','user_id'];

public function items()
{
  return $this->hasMany('App\Item');
}

public function uploadfile(){
  return $this->morphOne('App\UploadFile', 'uploadfileable');
}

public function comments()
{
    return $this->hasManyThrough('App\Comment', 'App\Item');
}
}
