<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Http\Services\BookingService;
use App\Models\Hotel;

class FrontController extends Controller
{
    public function index(){
        $hotels = Hotel::orderBy('id', 'DESC')->get();
        return view('welcome', compact('hotels'));
    }

    public function hotel($id){
        $hotel = Hotel::findOrFail($id);
        return view('hotel', compact('hotel'));
    }

    
    public function book(BookingStoreRequest $request, BookingService $bookingService){
        try {
            $bookingService->store($request->validated());
            return redirect()->route('user.bookings')->with('success','Please check your mail');
        } catch (\Throwable $th) {
            return back()->with('error',$th);
        }
    }


}
