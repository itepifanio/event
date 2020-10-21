<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    private ProfileService $service;

    public function __construct()
    {
        $this->service = new  ProfileService();
    }

    public function edit($id)
    {
        return view('profile.edit', [
            'user' => User::find($id),
        ]);
    }

    public function update(Request $request, User $user)
    {
        try {
            $this->service->update($user, $request->all());

            return redirect()->back()->with('success', 'Profile updated with success.');
        } catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }
}
