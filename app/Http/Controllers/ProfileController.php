<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EditProfileService;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit($id)
    {
        return view('profile.edit', [
            'user' => User::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = array_merge(
            $request->all(),
            ['id' => $id]
        );

        try {
            $editProfileService = new EditProfileService($data);

            $hasSuccess = $editProfileService->execute();
        } catch (\InvalidArgumentException $th) {
            return redirect()->back()->with('error', 'The old password is invalid!');
        }

        if ($hasSuccess) {
            return redirect()->back()->with('success', 'Profile updated with success.');
        }

        return redirect()->back()->with('error', 'Failed to update profile.');
    }
}
