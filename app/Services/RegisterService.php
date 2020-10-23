<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\OrganizationRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterService
{
    private UserRepository $userRepository;
    private OrganizationRepository $organizationRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->organizationRepository = new OrganizationRepository();
    }

    public function save(array $data): User
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $user = $this->userRepository->save(Arr::only($data, ['name', 'email', 'password']));

        if (isset($data['is_organization'])) {
            $organization = $this->organizationRepository
                ->save($user, Arr::only($data, ['description', 'foundation_date', 'name', 'organization_name']));

            $this->userRepository->attachOrganization($user, $organization, User::ROLES_OWNER);
        }

        return $user;
    }

    private function rules(): array
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
}
