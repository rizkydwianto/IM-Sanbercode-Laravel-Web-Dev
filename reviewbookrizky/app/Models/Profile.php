<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
  protected $table = 'posts';

  protected $fillable = ['age', 'address', 'user_id'];

  public function user()
  {
  return $this->belongsTo(user::class, 'user_id');
  }
}