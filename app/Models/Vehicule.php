<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'brand', 'model', 'fuel_type', 'registration_number', 'photo',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /*public function repairs()
    {
        return $this->hasMany(Repair::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }*/
}
