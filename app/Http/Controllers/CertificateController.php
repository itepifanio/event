<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Organization;

class CertificateController extends Controller
{
    public function show(Event $event, User $user)
    {
        $organization = Organization::find($event->organization_id);

        return \PDF::loadView('certificates.show', compact('event','organization','user'))->setPaper('a4', 'landscape')->download('certificado.pdf');
    }
}
