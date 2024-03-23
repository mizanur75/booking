<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'location', 'available_rooms','status'];

    
    public function booking(){
        return $this->hasOne(Booking::class);
    }
    
}
