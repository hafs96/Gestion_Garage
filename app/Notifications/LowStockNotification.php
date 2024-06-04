<?php

namespace App\Notifications;

use App\Models\Piece;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\SparePart;

class LowStockNotification extends Notification
{
    use Queueable;

    protected $piece;

    public function __construct(Piece $piece)
    {
        $this->piece = $piece;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Le stock pour la pièce de rechange ' . $this->piece->nom . ' est bas.')
                    ->action('Réapprovisionner maintenant', url('/piece/' . $this->piece->id))
                    ->line('Veuillez réapprovisionner cette pièce dès que possible.');
    }
}

?>
