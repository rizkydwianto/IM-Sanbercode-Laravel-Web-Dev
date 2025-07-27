<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';

  protected $fillable = ['title', 'content', 'image', 'genre_id'];

  public function genre()
  {
    return $this->belongsTo(genre::class, 'genre_id');
  }
  public function comments()
  {
    return $this->hasMany(Comment::class, 'post_id');
  }
}