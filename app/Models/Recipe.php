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

    // recette appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // recette peut avoir plusieurs tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'recipe_tag');
    }

    // recette peut aimer par plusieurs gourmands
    public function favoritesBy()
    {
        return $this->belongsToMany(Gourmand::class, 'favorites');
    }
}
