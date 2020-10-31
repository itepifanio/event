<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailInvite extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;
    private Event $event;
    private $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Organization $organization, $token)
    {
        $this->user = $user;
        $this->organization = $organization;
        $this->token = $token;
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
                'link' => route('invitation.confirm', ['token'=>$this->token]) 
            ]);
    }
}
