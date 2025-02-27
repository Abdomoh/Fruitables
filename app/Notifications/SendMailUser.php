<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendMailUser extends Notification implements ShouldQueue
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = url('/'); // Ensure this generates the correct URL

        return (new MailMessage)
            ->subject('مرحبًا بك في فاكهتي!')
            ->greeting('مرحبًا عزيزي العميل،')
            ->line('شكرًا لانضمامك إلى موقع فاكهتي. نحن سعداء بتسجيلك!')
            ->action('قم بزيارة الصفحة الرئيسية', $url)
            ->line('إذا واجهت مشكلة في النقر على الزر، يمكنك نسخ الرابط التالي ولصقه في متصفحك:')
            ->with(['rawUrl' => $url]) // Explicitly include the URL
            ->line('نأمل أن تستمتع بتجربتك. شكرًا لك!');
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
