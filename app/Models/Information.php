<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(InformationCategory::class, 'information_category_id', 'id');

    }
}
