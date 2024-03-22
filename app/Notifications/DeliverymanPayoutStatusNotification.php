<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DeliverymanPayoutStatusNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payout)
    {
        $this->payout = $payout;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return getSetting('delivery_boy_send_mail') ? ['mail','database'] : ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $array['view'] = 'backend.pages.payout';
        $array['subject'] = $this->payout->status == 'accepted' ? localize('Payout Accepted') : localize('Payout Rejected');
        $array['content'] = $this->payout->status == 'accepted' ? localize('Your Payout request has been approved') : localize('Your Payout request has been rejected');
        $array['email'] = $this->payout->deliveryman->email;
        $array['email'] = $this->payout->deliveryman->email;
       

        return (new MailMessage)
            ->view('backend.pages.payout', ['array' => $array])
            ->subject($this->payout->status == 'accepted' ? localize('Payout Accepted') : localize('Payout Rejected'));

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
            'message' => $this->payout->status == 'accepted' ? localize('Your Payout request has been approved') : localize('Your Payout request has been rejected'),
            'url' => route('deliveryman.payout')
        ];
    }
}
