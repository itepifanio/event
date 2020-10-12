<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use App\Services\DeleteOrganizationService;
use App\Services\EditOrganizationService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
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

    public function show($id)
    {
        $organization = Organization::find($id);
        return view('organizations.show', [
            'organization' => $organization,
            'userOrganization' => User::find($organization->user_id)
        ]);
    }

    public function edit($id)
    {
        $organization = Organization::find($id);

        return view('organizations.edit', [
            'organization' => $organization,
            'userOrganization' => User::find($organization->user_id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = array_merge(
            $request->all(),
            ['id' => $id]
        );

        $editOrganizationService = new EditOrganizationService($data);

        $hasSuccess = $editOrganizationService->execute();

        if ($hasSuccess) {
            return redirect()->route('organizations.index', [
                'organizations' => Organization::all()
            ])->with('success', 'Organization updated with success.');
        }

        return redirect()->back()->with('erro', 'Failed to update organization.');
    }

    public function destroy($id)
    {
        $deleteOrganizationService = new DeleteOrganizationService(['id' => $id]);

        $hasSuccess = $deleteOrganizationService->execute();

        if ($hasSuccess) {
            return redirect()->route('organizations.index', [
                'organizations' => Organization::all()
            ])->with('success', 'Organization deleted with success.');
        }
    }
}
