<?php

namespace App\Http\Services;

use App\Models\Hotel;

class HotelService{
    public function store(array $data){
        Hotel::create($data);
    }

    public function update(Hotel $hotel, array $data){
        $hotel->update($data);
    }
}