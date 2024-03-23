<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;
use App\Http\Services\HotelService;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::orderBy('id','DESC')->get();
        return view('admin.hotels.index', compact('hotels'));
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
    public function store(HotelStoreRequest $request, HotelService $service)
    {
        try {
            $service->store($request->validated());
            return back()->with('success','Data added succesfully');
        } catch (\Exception $e) {
            flash()->addError($e);
            return back()->with('error',$e);
        }
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
    public function edit(Hotel $hotel)
    {
        $data = $hotel;
        return view('admin.hotels.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelUpdateRequest $request, Hotel $hotel, HotelService $service)
    {
        try {
            $service->update($hotel, $request->validated());
            return back()->with('success','Data Updated succesfully');
        } catch (\Exception $e) {
            flash()->addError($e);
            return back()->with('error',$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return back()->with('success','Data deleted successfully!');
    }
}
