<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gourmand extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'biographie',
        'adresse',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Recipe::class, 'favorites');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
