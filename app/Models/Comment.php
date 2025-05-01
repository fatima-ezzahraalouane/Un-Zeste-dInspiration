<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'gourmand_id'];

    public function gourmand()
    {
        return $this->belongsTo(Gourmand::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
