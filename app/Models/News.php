<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'publish_date', 'content', 'tags', 'news_categories_id', 'user_id'];

    public function kategori()
    {
        return $this->belongsTo(NewsCategory::class, 'news_categories_id', 'id');

    }

    public function gambar()
    {
        return $this->hasMany(NewsDetailImages::class);

    }


}
