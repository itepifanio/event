<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RhService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function update(Organization $organization, User $user, array $data) : void
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $this->userRepository->update($user, Arr::only($data, ['name', 'email']));
        $this->userRepository->attachOrganization($user, $organization, $data['role']);
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => ['required', 'string', Rule::in(User::ROLES)],
        ];
    }
}
