<?php

namespace App\Services\Dto;

use App\Models\User;
use Illuminate\Validation\Rule;

class EditRhDto extends AbstractDto implements DtoInterface
{
    public string $name;
    public string $email;
    public string $role;
    public int $userId;
    public int $organizationId;

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

    protected function map(array $data): bool
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->role = $data['role'];
        $this->userId = $data['user_id'];
        $this->organizationId = $data['organization_id'];

        return true;
    }
}
