<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSubscription extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;
    private Event $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Event $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('event@event.com', 'Event Up Guys')
            ->subject("Subscription at Event")
            ->markdown('mails.subscription')
            ->with([
                'name' => $this->user->name,
                'event'=> $this->event,
                'link' => route('organizations.events.show', [$this->event->organization_id, $this->event->id]) 
            ]);
    }
}
