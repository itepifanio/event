<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        return view('organizations.index', [
            'organizations' => Organization::all()
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
            'organization' => Organization::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('organizations.edit', [
            'organization' => Organization::find($id),
        ]);
    }

    public function update(OrganizationRequest $request, $id)
    {
        $organization = Organization::find($id);
        $input = $request->validated();
        $organization->update($input);

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
