<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['name','check_in','check_out','user_id','room_id'];
    
    public function paiement()
    {
        return $this->hasOne(Paiment::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

}
