<?php

namespace App\Services;

use App\Models\User;
use NouvelleNotification;


class AdminActionService
{
    public function envoyerNotificationAdministrative()
    {
        // Logique pour récupérer l'utilisateur à qui envoyer l'email
        $user = User::find(1);

        // Envoi de la notification
        $user->notify(new NouvelleNotification());

        // Autre logique métier si nécessaire
    }
}
