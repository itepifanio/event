<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProfileService
{
    public function update(User $user, array $data) : User
    {
        $validator = Validator::make($data, $this->rules($user->id));

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        if(isset($data['old-password'])) {
            if(Hash::check($data['old-password'], $user->password)){
                $data['password'] = Hash::make($data['password']);
            }else {
                $validator = Validator::make($data, ['old-password' => 'required']);

                $validator->after(function ($validator) {
                    $validator->errors()->add('old-password', 'The old password is invalid!');
                });

                throw ValidationException::withMessages($validator->errors()->toArray());
            }
        }

        return tap($user)->update($data);
    }

    private function rules(int $id): array
    {
        return [
            'id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'old-password' => 'sometimes|string',
            'password' => 'sometimes|string|min:8|confirmed',
            'password_confirmation' => 'sometimes|string|min:8|same:password',
        ];
    }
}
