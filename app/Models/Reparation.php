<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicule_id', 'mecanique_id', 'status', 'description', 'date_debut', 'date_fin',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function mecanique()
    {
        return $this->belongsTo(Mecanique::class);
    }
}
