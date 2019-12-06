<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['content','item_id','user_id'];

public function item(){
  return $this->belongsTo('App\Item');
}

public function author()
{
return $this->belongsTo(User::class, 'user_id', 'id');
}
}
