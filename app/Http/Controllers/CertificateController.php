<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;

class CertificateController extends Controller
{
    public function show(Event $event, User $user)
    {
        $organization = $event->organization;

        return \PDF::loadView('certificates.show', compact('event','organization','user'))
                ->setPaper('a4', 'landscape')
                ->download('Certificado - '.$user->name.'.pdf');
    }
}
