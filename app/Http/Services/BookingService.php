<?php

namespace App\Http\Services;

use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingService{

    public function get_data(){
        $bookings = Booking::orderBy('id','DESC')->with(['user','hotel'])->get();
        if(Auth::user()->role_id === 2){
            $bookings = Booking::orderBy('id','DESC')->where('user_id', Auth::user()->id)->with(['user','hotel'])->get();
        }

        return $bookings;
    }

    public function store(array $data){
        $user = Auth::user();
        $datas = array_merge([
            'user_id' => $user->id,
        ], $data);


        DB::transaction(function() use($datas, $user){
            Booking::create($datas);
            Mail::to($user->email)->send(new BookingMail($user));
            Hotel::where('id',$datas['hotel_id'])->decrement('available_rooms',$datas['number_of_room']);
        }, 5);
    }

    public function update(Booking $booking, array $data){
        DB::transaction(function() use($booking, $data){
            $booking->update($data);
            if($data['status'] == 'Checked out'){
                Hotel::where('id',$data['hotel_id'])->increment('available_rooms',$data['number_of_room']);
            }
        }, 5);
    }

    

    public function destroy(Booking $booking){
        DB::transaction(function() use($booking){
            $booking = tap($booking)->delete();
            Hotel::where('id',$booking['hotel_id'])->increment('available_rooms',$booking['number_of_room']);
        }, 5);
    }
}