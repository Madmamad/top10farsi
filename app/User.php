<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function comment(){
      return $this->morphOne('App\Comment','commentable');
  }

  public function top10(){
    return $this->hasMany('App\Top10');
  }

  public function item(){
    return $this->hasMany('App\Item');
  }

  public function userpic(){
    return $this->hasOne('App\Userpic');
  }

}
