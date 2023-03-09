<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
  use HasFactory, Sluggable;
  /*  fillable() = yang hanya boleh di inisiasi
      guarded() = yang tidak boleh di inisiasi
  */
//  protected $fillable = ['title', 'excerpt', 'body'];
  protected $guarded = ['id'];
  protected $with = ['author', 'category'];

  public function scopeFilter($query, array $filters)
  {
    $query->when($filters['search'] ?? false, function ($query, $search) {
      return $query->where('title', 'like', '%' . $search . '%')
              ->orWhere('body', 'like', '%' . $search . '%');
    });

    $query->when($filters['category'] ?? false, function ($query, $category) {
      return $query->whereHas('category', function ($query) use ($category) {
        return $query->where('slug', $category);
      });
    });

    $query->when($filters['author'] ?? false, function ($query, $author) {
      return $query->whereHas('author', function ($query) use ($author) {
        return $query->where('username', $author);
      });
    });
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function getRouteKeyName(): string
  {
    return 'slug';
  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }
}
