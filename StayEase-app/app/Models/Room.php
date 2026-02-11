<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['hotel_id', 'number', 'image', 'price_per_night', 'capacity', 'description'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'rooms_tags');
    }
    public function properties() 
    {
        return $this->belongsToMany(Property::class, 'rooms_properties');
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'rooms_hotel');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
