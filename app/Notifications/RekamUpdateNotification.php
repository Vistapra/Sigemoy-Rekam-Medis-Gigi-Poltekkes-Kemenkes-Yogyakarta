<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RekamUpdateNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $rekam;
    public $message;

    public function __construct($rekam, $message)
    {
        $this->rekam = $rekam;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            'id_rekam' => $this->rekam->id,
            'no_rekam' => $this->rekam->no_rekam,
            'created_at' => $this->rekam->created_at,
            'id_pasien' => $this->rekam->pasien_id,
            'nama_pasien' => $this->rekam->pasien->nama,
            'message' => $this->message,
        ];
    }
}
