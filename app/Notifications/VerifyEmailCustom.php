<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;
// use Illuminate\Notifications\Notification;

class VerifyEmailCustom extends VerifyEmail
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
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $url = $this->verificationUrl($notifiable);
        return (new MailMessage)
            ->subject('Verifikasi Email')
            ->greeting('Halo ' . $notifiable->name)
            ->line('Terima kasih telah mendaftar di sistem kami.')
            ->line('Klik tombol di bawah untuk verifikasi email Anda.')
            ->action('Verifikasi email', $url)
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
