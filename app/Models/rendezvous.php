<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'mec_id',
        'date',
        'time',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function mecanique()
    {
        return $this->belongsTo(Mecanique::class, 'mec_id');
    }
}
