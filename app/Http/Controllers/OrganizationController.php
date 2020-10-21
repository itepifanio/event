<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use App\Services\OrganizationService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrganizationController extends Controller
{
    private OrganizationService $service;

    public function __construct()
    {
        $this->service = new OrganizationService();
    }

    public function index()
    {
        $organizations = Organization::whereHas('users', function (Builder $query){
            $query->where('users.id', auth()->id());
        })->get();

        return view('organizations.index', [
            'organizations' => $organizations,
        ]);
    }

    public function create()
    {
        return view('organizations.create');
    }

    public function show(Organization $organization)
    {
        return view('organizations.show', [
            'organization' => $organization,
            'userOrganization' => User::find($organization->user_id)
        ]);
    }

    public function edit(Organization $organization)
    {
        return view('organizations.edit', [
            'organization' => $organization,
            'userOrganization' => User::find($organization->user_id)
        ]);
    }

    public function update(Request $request, Organization $organization)
    {
        try {
            $this->service->update($organization, $request->all());

            return redirect()->route('organizations.index', [
                'organizations' => Organization::all()
            ])->with('success', 'Organization updated with success.');
        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('erro', 'Failed to update organization.');
        }
    }

    public function destroy(Organization $organization)
    {
        try {
            $this->service->delete($organization);

            return redirect()->route('organizations.index', [
                'organizations' => Organization::all()
            ])->with('success', 'Organization deleted with success.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete organization.');
        }
    }
}
