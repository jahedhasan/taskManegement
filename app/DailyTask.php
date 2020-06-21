<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class DailyTask extends Model
{
  use HasSlug;

  protected $guarded = [];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function getSlugOptions() : SlugOptions
  {
    return SlugOptions::create()
        ->generateSlugsFrom('title')
        ->saveSlugsTo('slug');
  }
}
