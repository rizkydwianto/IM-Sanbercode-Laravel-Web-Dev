<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class genre extends Model
{
  protected $table = 'genres';

  protected $fillable = ['name', 'description'];

  public function Posts()
  {
    return $this->hasMany(Post::class, 'genre_id');
  }
}