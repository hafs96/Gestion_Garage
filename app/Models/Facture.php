<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'repair_id', 'date', 'total_amount',
    ];
    public function setDateAttribute($value)
    {
        // Convertir la valeur en objet DateTime
        $this->attributes['date'] = new DateTime($value);
    }
    public function repair()
    {
        return $this->belongsTo(Reparation::class);
    }
}
