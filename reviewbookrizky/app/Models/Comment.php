<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comment';

  protected $fillable = ['user_id', 'post_id', 'content'];

  public function owner()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}