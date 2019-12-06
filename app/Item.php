<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $guarded = [];

    protected $fillable = ['title','description','user_id','top10_id'];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function top10(){
      return $this->belongsTo('App\Top10');
    }

    public function uploadfile(){
    return $this->morphOne('App\UploadFile', 'uploadfileable');
    }

    public function author(){
    return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
