<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'rooms_tags');
    }
}