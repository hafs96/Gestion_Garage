<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanique extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'specialisation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reparations()
    {
        return $this->hasMany(Reparation::class);
    }
}
