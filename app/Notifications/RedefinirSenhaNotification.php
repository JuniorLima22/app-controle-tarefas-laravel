<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    public $token;
    public $name;
    public $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $name, $email)
    {
        $this->token = $token;
        $this->name  = $name;
        $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = 'http://localhost:8000/password/reset/'. $this->token. '?email='. $this->email;
        return (new MailMessage)
                    ->subject(Lang::get('Atualização de senha'))
                    ->greeting(Lang::get('Olá '. $this->name))
                    ->line(Lang::get('Esqueceu a senha? Sem problemas, vamos resolver isso!'))
                    ->action(Lang::get('Clique aqui para modificar a senha'), $url)
                    ->line(Lang::get('O link acima expira em :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
                    ->line(Lang::get('Caso você não tenha requisitado a alteração de senha, então nehuma ação é necessária.'))
                    ->salutation('Até breve!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
