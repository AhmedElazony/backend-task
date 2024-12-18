<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function images(): HasMany
    {
        return $this->hasMany(ArticleImage::class);
    }
}
