<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Organization;
use App\Models\User;
use App\Models\Invite;
use App\Services\RhService;
use App\Exceptions\InvitationAlreadyConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

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
        try {
            $this->service->save($organization, $request->all());

            return redirect()->route('organizations.rh.index', [
                'users' => $organization->users()->where('users.id', '!=', auth()->id())->get(),
                'organization' => $organization,
            ])->with('success', 'Users invited with success.');

        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (InvitationAlreadtConfirmed $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to Invite user.');
        }
    }
    
    public function create(Organization $organization)
    {
        return view('rh.create', [
            'users' => User::all()->diff($organization->users()->get()),
            'organization' => $organization,
        ]);
    }

    public function edit(Organization $organization, User $user)
    {
        $user = $user->load(['organizations' => fn($q) => $q->where('organizations.id', $organization->id)]);
        return view('rh.edit', compact('organization', 'user'));
    }
    
    public function invite (Invite $invitation){
        $user_organization = DB::table('user_organizations')->where('id', $invitation->user_organization_id)->first();
        
        return view('rh.invite', [
            'invitation' => $invitation,
            'user' => User::find($user_organization->user_id),
            'organization' => Organization::find($user_organization->organization_id),
        ]);     
    }

    public function confirm (Invite $invitation){  
        try {
            $this->service->confirmInvitation($invitation, request()->all());
            return redirect()->route('home');
        } catch (InvitationAlreadyConfirmed $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        } catch (ValidationException $e){
            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('home');
        }
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
