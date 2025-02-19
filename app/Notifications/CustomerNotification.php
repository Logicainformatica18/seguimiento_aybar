<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail']; // Envía por correo y registra en el log
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    
                    ->subject("Notificación de un nuevo cliente") // Personaliza el asunto del correo
                    ->greeting('¡Hola!') // Cambia el saludo inicial
                    ->line("Un nuevo cliente se ha inscrito") // Personaliza el contenido del mensaje
                    ->action('Ir a la acción', url('admin/clientes')) // Botón con enlace
                    ->salutation('Saludos, Sistema Ayba Corp'); // Personaliza la despedida
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
