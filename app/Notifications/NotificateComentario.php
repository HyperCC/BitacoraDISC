<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificateComentario extends Notification
{

    protected $avanFecha;
    protected $bitaNom;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($avanFecha, $bitaNom)
    {
        $this->avanFecha = $avanFecha;
        $this->bitaNom = $bitaNom;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('BitacoraDISC - Nuevo Comentario')
            ->line('Nuevo cambio en los Comentarios')
            ->action('Clic aquí para ver todas tu notificaciones ', route('notificaciones-index'))
            ->line('Gracias por utilizar BitacoraDISC');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return string
     */
    public function toArray($notifiable)
    {
        return 'El Profesor ' . auth()->user()->name . ' ha ingresado un Comentario para el Avance del ' . $this->avanFecha . ' para la Bitacora ' . $this->bitaNom;

    }
}
