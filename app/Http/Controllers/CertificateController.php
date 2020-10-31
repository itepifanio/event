<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Organization;
use PDF;

class CertificateController extends Controller
{
    public function show(User $user, Event $event)
    {
        $organization = Organization::find($event->organization_id);
        // $pdf = PDF::loadView('certificates.show', [
        //     'event' => $event,
        //     'organization' => $organization,
        //     'user' => $user,
        // ]);

        return view('certificates.show', [
            'event' => $event,
            'organization' => $organization,
            'user' => $user,
        ]);
        // return $pdf->download('certificado.pdf');
    }
}
