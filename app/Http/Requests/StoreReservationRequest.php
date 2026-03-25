<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'charging_station_id' => 'required|exists:charging_stations,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ];
    }
}