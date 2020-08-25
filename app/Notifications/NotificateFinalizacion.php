<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificateFinalizacion extends Notification
{
    protected $bitaNom;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bitaNom)
    {
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
            ->subject('BitacoraDISC - Finalización Bitacora')
            ->line('Nuevo cambio con una Bitacora')
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
        return 'El ' . auth()->user()->rol . ' ' . auth()->user()->name . ' ha finalizado la Bitacora ' . $this->bitaNom;

    }
}
