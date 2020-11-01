<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Organization;
use App\Models\Confirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailInvite extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;
    private Event $event;
    private Confirmation $confirmation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Organization $organization, Confirmation $confirmation)
    {
        $this->user = $user;
        $this->organization = $organization;
        $this->confirmation = $confirmation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('event@event.com', 'Event Up Guys')
            ->subject("Invite of Organization")
            ->markdown('mails.invitation')
            ->with([
                'name' => $this->user->name,
                'organization'=> $this->organization,
                'link' => route('invitation.confirm', [$this->confirmation->token]) 
            ]);
    }
}
