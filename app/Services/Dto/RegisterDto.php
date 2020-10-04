<?php

namespace App\Services\Dto;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\RequiredIf;

class RegisterDto extends AbstractDto implements DtoInterface
{
    public $name;
    public $email;
    public $password;
    public $is_organization;
    public $organizationName;
    public $description;
    public $foundation_date;

    /**
     * @return array
     */
    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'organization_name' => Rule::requiredIf(fn() => $this->is_organization != null),
            'is_organization' => 'string',
            'description' => 'sometimes|required|max:150|string',
            'foundation_date' => 'sometimes|required|date',
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];

        if(isset($data['is_organization'])) {
            $this->is_organization = $data['is_organization'];
            $this->description = $data['description'];
            $this->foundation_date = $data['foundation_date'];
            $this->organizationName = $data['organization_name'];
        }

        return true;
    }
}
