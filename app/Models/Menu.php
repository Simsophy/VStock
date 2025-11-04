<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // <-- Make sure this is here

class Menu extends Model
{
    use HasFactory;

    // If your table has sub-menus
    public function subMenus()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}
