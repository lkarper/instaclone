<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function profileImage() {
        return '/storage/' . ($this->image ?? 'storage/noimage.png');
    }

    public function followers() {
        return $this->belongsToMany(User::class);
    }
}
