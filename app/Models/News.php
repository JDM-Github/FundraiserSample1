<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\NewsScopes;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory, NewsScopes, Sluggable;

    protected $fillable = ['headline', 'content', 'slug', 'publish_date', 'expiration_date'];

    public function sluggable(): array
    {
        return ['slug' => ['source' => 'headline']];
    }
}
