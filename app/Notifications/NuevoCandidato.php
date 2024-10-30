<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;
    //private $idVacante;
    //private $nombreVacante;
    //private $usuarioId;

    /**
     * Create a new notification instance.
     */
    public function __construct($idVacante, $nombreVacante, $usuarioId)
    {
        $this->idVacante = $idVacante;
        $this->nombreVacante = $nombreVacante;
        $this->usuarioId = $usuarioId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url("/notificaciones");

        return (new MailMessage)
            ->line('Un nuevo candidato se ha postulado.')
            ->line("La vacante es {$this->nombreVacante}.")
            ->action('Ver notificaciones', $url)
            ->line('Gracias por utilizar DevJobs!');
    }

    //Almacena las notificaciones en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            "idVacante" => $this->idVacante,
            "nombreVacante" => $this->nombreVacante,
            "usuarioId" => $this->usuarioId,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
