<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Expence;

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

  // Expenceへのリレーション(User:Expence = 一:多)
  // 特定ユーザーの全Expenceを取得
  public function expenses() {
    return $this->hasMany(Expence::class);
  }
}
