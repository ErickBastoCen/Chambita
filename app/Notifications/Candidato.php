<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $id_vacante;
    protected $nombre_vacante;
    protected $usuario_id;

    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/candidatos/' . $this->id_vacante);
        return (new MailMessage)
                    ->line('Hay alguien interesado en la chambita que publicaste')
                    ->line('La chambita es:'. $this->nombre_vacante)
                    ->action('Ver', $url)
                    ->line('Mi Chambita te espera');
    }

    //almacenamos notificaciones en la bd
    public function toDatabase($notifiable)
    {
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id 
        ];
    }
}
