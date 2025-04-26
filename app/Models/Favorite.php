<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['gourmand_id', 'recipe_id'];

    public function gourmand()
    {
        return $this->belongsTo(Gourmand::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
