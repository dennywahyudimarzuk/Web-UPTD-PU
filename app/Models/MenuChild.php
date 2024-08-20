<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuChild extends Model
{
    use HasFactory;

    public function menu()
    {
        return $this->belongsTo(Menu::class, "menu_id", "id")->where('active', 1);
    }

    public function page()
    {
        return $this->belongsTo(Page::class, "page_id", "id")->where('active', 1);
    }
}
