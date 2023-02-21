<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
  use HasFactory;
  /*  fillable() = yang hanya boleh di inisiasi
      guarded() = yang tidak boleh di inisiasi
  */
//  protected $fillable = ['title', 'excerpt', 'body'];
  protected $guarded = ['id'];

  public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Category::class);
  }
}
