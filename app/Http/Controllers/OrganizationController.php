<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrganizationRequest;
use App\Models\Organization;
use App\Models\User;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations_info  = DB::table('users')
                            ->join('organizations', 'users.id', '=', 'organizations.user_id')
                            ->select('users.*', 'organizations.*')
                            ->get();
        
        return view('organizations.index', [
            'organizations' => $organizations_info
        ]);
    }

    public function create()
    {
        return view('organizations.create');
    }

    public function store(OrganizationRequest $request)
    {
        $input = $request->validated();

        Organization::create($input);

        return redirect()->route('organizations.index', [
            'organizations' => Organization::all()
        ])->with('success', 'Organization created with success.');
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

    public function update(OrganizationRequest $request, $id)
    {
        $organization = Organization::find($id);
        $user_organization = User::find($organization->user_id);
        

        $input = $request->validated(); // A VALIDAÇÃO DEVE SER ALTERADA, UM NOVO TIPO REQUEST DEVE SER CRIADO
        $organization->update($input);
        $user_organization->update($input);

        return redirect()->route('organizations.index', [
            'organizations' => Organization::all()
        ])->with('success', 'Organization updated with success.');
    }

    public function destroy($id)
    {
        Organization::find($id)->delete();

        return redirect()->route('organizations.index', [
            'organizations' => Organizarion::all()
        ])->with('success', 'Organization deleted with success.');
    }
}
