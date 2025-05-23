<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'statut',
        'theme_id',
        'gourmand_id',
    ];

    public function gourmand()
    {
        return $this->belongsTo(Gourmand::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
