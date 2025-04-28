<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'admin_id'];

    // catégorie a plusieurs recettes
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
