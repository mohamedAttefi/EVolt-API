<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ChargingStation;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'charging_station_id', 'start_time', 'duration', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chargingStation()
    {
        return $this->belongsTo(ChargingStation::class);
    }

    public function chargingSessions()
    {
        return $this->hasMany(ChargingSession::class);
    }
}
