<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotificateAvance extends Notification
{
    protected $tipo;
    protected $bitaNom;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tipo, $bitaNom)
    {
        // define evidencia o avance
        $this->tipo = $tipo;
        // nombre de bitacora
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
            ->subject('BitacoraDISC - Nuevo Avance')
            ->line('Nuevo cambio en los Avances')
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
        return 'El Alumno ' . auth()->user()->name . ' ha ingresado un nuevo ' . $this->tipo . ' para la Bitacora ' . $this->bitaNom;
    }

    /*
     * Cuando un estudiante registra un avance o ingresa una evidencia, se debe notificar a su profesor guía
     */
}
