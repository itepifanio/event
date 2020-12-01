<?php

namespace App\Geoevent\Services;

use App\Models\User;
use App\Geoevent\Repositories\UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class RegisterService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function save(array $data): User
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->createUser($data);
    }

    public function createUser(array $data) : User
    {
        return $this->userRepository->save(Arr::only($data, ['name', 'email', 'password']));
    }

    protected abstract function rules() : array;
}
