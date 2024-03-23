<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'hotel_id' => 'required',
            'room_type' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'occupants' => ['required','integer'],
            'number_of_room' => ['required','integer'],
            'status' => ['string']
        ];
    }
}
