<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piece;

class NotificationController extends Controller
{
    public function lowStockNotifications()
    {
        $notifications = Piece::whereColumn('quantite', '<=', 'seuil')->get();
        return view('Admin.Notification', compact('notifications'));
    }

    public function replenishStock($id)
    {
        $piece = Piece::findOrFail($id);
        $piece->increment('quantite', 10);

        return redirect()->route('notifications.lowStock')->with('success', 'Stock réapprovisionné avec succès.');
    }
}
