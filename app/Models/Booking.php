<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['user_id', 'hotel_id', 'room_type', 'check_in', 'check_out', 'occupants','number_of_room','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
