<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Http\Services\BookingService;
use App\Models\Booking;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookingService $service)
    {
        $bookings = $service->get_data();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function userindex(BookingService $service){
        return $this->index($service);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingStoreRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $data = $booking;
        return view('admin.bookings.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingUpdateRequest $request, Booking $booking, BookingService $service)
    {
        try {
            $service->update($booking, $request->validated());
            return back()->with('success','Booking Updated Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error',$th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        DB::transaction(function() use($booking){
            $booking = tap($booking)->delete();
            Hotel::where('id',$booking['hotel_id'])->increment('available_rooms',$booking['number_of_room']);

        }, 5);
        return back()->with('success','Booking deleted successfully!');
    }
}
