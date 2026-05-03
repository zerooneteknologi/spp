<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class ResetPasswordCustom extends ResetPassword
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->email,
        ], false));

        return (new MailMessage)
            ->subject('Reset Password')
            ->greeting('Halo ' . $notifiable->name)
            ->line('Anda telah meminta untuk merubah password Anda')
            ->line('Jika anda merasa tidak melakukan permintaan abaikan email ini atau hubungi tim kami!')
            ->line('Klik tombol untuk reset password.')
            ->action('Reset Password', $url)
            ->line('Terima Kasih!')
            ->salutation('Salam, Tim Zero One');
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
