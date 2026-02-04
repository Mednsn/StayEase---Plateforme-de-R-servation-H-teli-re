<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name','description','address'];
  
    public function user(){
    return $this->belongsTo(User::class);
    }
}
