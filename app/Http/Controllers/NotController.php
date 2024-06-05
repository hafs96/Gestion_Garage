<?php

namespace App\Http\Controllers;
use App\Models\User;

use NouvelleNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function envoyerNotification(Request $request)
    {
        // Logique pour récupérer l'utilisateur à qui envoyer l'email
        $user = User::find(1);

        // Envoi de la notification
        $user->notify(new NouvelleNotification());
}
}
