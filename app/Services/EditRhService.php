<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Validation\Rule;

class EditRhService extends ValidateData implements ServiceInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;

        $this->validator();
    }

    public function execute(): bool
    {
        $user = User::find($this->data['user_id']);

        $user->update([
            'name'  => $this->data['name'],
            'email' => $this->data['email'],
        ]);

        $user->organizations()->sync([
            $this->data['organization_id'] => [
                'role' => $this->data['role'],
            ]
        ]);

        return true;
    }

    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => ['required', 'string', Rule::in(User::ROLES)],
            'organization_id' => ['required', 'exists:organizations,id'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
