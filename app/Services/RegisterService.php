<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Organization;

class RegisterService extends ValidateData implements ServiceInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->validator();
    }


    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_organization' => 'string',
            'description' => 'sometimes|required|max:150|string',
            'foundation_date' => 'sometimes|required|date',
        ];
    }

    public function execute(): bool
    {
        $user = User::create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => Hash::make($this->data['password']),
        ]);

        if (isset($this->data['is_organization'])) {
            Organization::create([
                'user_id' => $user->id,
                'description' => $this->data['description'],
                'foundation_date' => $this->data['foundation_date']
            ]);
        }

        return true;
    }
}
