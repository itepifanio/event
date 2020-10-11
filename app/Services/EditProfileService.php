<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;
use App\Models\User;

class EditProfileService extends ValidateData implements ServiceInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->validator();
    }

    public function  configureValidatorRules(): array
    {
        return [
            'id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->data['id'],
            'old-password' => 'sometimes|string',
            'password' => 'sometimes|string|min:8|confirmed',
        ];
    }

    public function execute(): bool
    {
        $user = User::find($this->data['id']);

        if (!$user) {
            return false;
        }

        if(isset($this->data['old-password'])) {
            if(Hash::check($this->data['old-password'], $user->password)){
                $this->data['password'] = Hash::make($this->data['password']);
            }else {
                throw new InvalidArgumentException(
                    'Error: The old password is invalid!'
                );
            }
        }

        $user->update($this->data);

        return true;
    }
}
