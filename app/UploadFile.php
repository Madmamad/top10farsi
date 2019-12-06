<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    //
    protected $fillable = ['address','list_id','type','item_id'];

    public function uploadfileable(){
      return $this->morphTo();
    }
    
}
