<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use App\Services\Dto\EditEventDto;
use App\Services\Dto\EditRhDto;
use App\Services\EditEventService;
use App\Services\EditRhService;

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

    public function edit(Organization $organization, User $user)
    {
        $user = $user->load(['organizations' => fn($q) => $q->where('organizations.id', $organization->id)]);

        return view('rh.edit', compact('organization', 'user'));
    }

    public function update(Organization $organization, User $user)
    {
        $data = array_merge(
            request()->all(), [
            'user_id' => $user->id,
            'organization_id' => $organization->id,
        ]);

        $editRhDto = new EditRhDto($data);

        EditRhService::make($editRhDto)->execute();

        return redirect()->route('organizations.rh.index', $organization->id)
            ->with('success', 'User updated with success.');
    }
}
