<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'repair_id', 'date', 'total_amount',
    ];

    public function repair()
    {
        return $this->belongsTo(Reparation::class);
    }
}
