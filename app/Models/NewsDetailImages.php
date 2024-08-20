<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsDetailImages extends Model
{
    use HasFactory;
    protected $fillable = ['news_id', 'image'];
    public function berita()
    {
        return $this->belongsTo(News::class, 'id', 'news_id');

    }
}
