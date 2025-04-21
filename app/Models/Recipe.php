<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'preparation_time',
        'cooking_time',
        'servings',
        'complexity',
        'ingredients',
        'instructions',
        'category_id',
    ];

    // Une recette appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Une recette peut avoir plusieurs tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'recipe_tag');
    }
}
