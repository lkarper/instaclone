<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = []; // Tells Laravel that everything is already validated, no need to protect
    protected $fillable = [
        'caption',
        'image',
        'user_id',
        'title',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
