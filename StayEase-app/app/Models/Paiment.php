<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiment extends Model
{
    protected $fillable = ['price_paiment','reservation_id','mode_paiement'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
