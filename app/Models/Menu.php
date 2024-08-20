<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function menu_child()
    {
        return $this->hasMany(MenuChild::class, "menu_id", "id")->where('active', 1)->orderBy('order', 'asc');
    }
}
