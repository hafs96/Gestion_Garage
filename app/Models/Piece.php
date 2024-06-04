<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\LowStockNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Piece extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'reference', 'fournisseur', 'prix', 'quantite', 'seuil',
    ];

    public static function boot()
    {
        parent::boot();

        static::updated(function ($pieces) {
            if ($pieces->quantite <= $pieces->seuil) {
                // Envoyer une notification
                $admins = User::where('role', 'admin')->get();
                foreach ($admins as $admin) {
                    $admin->notify(new LowStockNotification($pieces));
                }
            }
        });
    }
}
