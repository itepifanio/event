<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\User;

class EditOrganizationService extends ValidateData implements ServiceInterface
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
            'id' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|max:150|string',
            'foundation_date' => 'required|date',
        ];
    }

    public function execute(): bool
    {
        $organization = Organization::find($this->data['id']);

        if (!$organization) {
            return false;
        }

        $organization->update($this->data);

        $user_organization = User::find($organization->user_id);

        if (!$user_organization) {
            return false;
        }

        $user_organization->update($this->data);

        return true;
    }
}
