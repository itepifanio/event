<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Models\Organization;
use App\Models\User;

class OrganizationController extends Controller
{
    public function getOrganizationInfo($id){

        $organization = Organization::find($id);
        $user_organization = User::find($organization->user_id);
        return array(
            'id' => $organization->id,
            'user_id' => $user_organization->id,
            'name' => $user_organization->name,
            'email' => $user_organization->email,
        );

    }
    public function index()
    {
        $organizations = Organization::all();
        $organizations_info = array();
        foreach ($organizations as &$ong) {
            array_push($organizations_info, $this->getOrganizationInfo($ong->id));
        }
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
        return view('organizations.show', [
            'organization' => $this->getOrganizationInfo($id)
        ]);
    }

    public function edit($id)
    {
        return view('organizations.edit', [
            'organization' => $this->getOrganizationInfo($id),
        ]);
    }

    public function update(OrganizationRequest $request, $id)
    {

        $organization_info = $this->getOrganizationInfo($id);
        $user_organization = User::find($organization_info['user_id']);
        $organization = Organization::find($organization_info['id']);

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
