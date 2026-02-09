<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    
    public function room()
    {
        return $this->hasMany(Room::class);
    }

}
