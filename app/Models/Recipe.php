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
        'chef_id',
        'statut',
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
    public function favoritedBy()
    {
        return $this->belongsToMany(Gourmand::class, 'favorites');
    }

    public function chef()
    {
        return $this->belongsTo(Chef::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
