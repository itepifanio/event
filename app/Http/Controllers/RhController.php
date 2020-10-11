<?php

namespace App\Http\Controllers;

use App\Models\Organization;

class RhController extends Controller
{
    public function index(Organization $organization)
    {
        $users = $organization->users()->where('users.id', '!=', auth()->id())->get();

        return view('rh.index', [
            'users' => $users,
            'organization' => $organization,
        ]);
    }
}
