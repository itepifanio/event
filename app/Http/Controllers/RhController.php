<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use App\Services\RhService;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RhController extends Controller
{
    private RhService $service;

    public function __construct()
    {
        $this->service = new RhService();
    }

    public function index(Organization $organization)
    {
        $users = $organization->users()->where('users.id', '!=', auth()->id())->get();

        return view('rh.index', [
            'users' => $users,
            'organization' => $organization,
        ]);
    }
    public function store(Request $request, Organization $organization)
    {
        $users = $request->input('users');
        foreach($users as $user){
            dd($user);
        }
    }
    public function invite(Organization $organization, $id)
    {
        return view('rh.invite', [
            'user' => User::find($id)->first(),
            'organization' => $organization,
        ]);
    }
    public function create(Organization $organization)
    {
        return view('rh.create', [
            'users' => User::all(),
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
        try {
            $this->service->update($organization, $user, request()->all());

            return redirect()->route('organizations.rh.index', $organization->id)
                ->with('success', 'User updated with success.');
        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user.');
        }
    }
}
