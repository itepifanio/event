<?php

namespace App\Services;

use App\Models\Organization;
use App\Repositories\OrganizationRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrganizationService
{
    private OrganizationRepository $repository;

    public function __construct()
    {
        $this->repository = new OrganizationRepository();
    }

    public function update(Organization $organization, array $data) : Organization
    {
        $validator = Validator::make($data, $this->rules());

        if($validator->fails()){
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return $this->repository->update($organization, $data);
    }

    public function delete(Organization $organization) : void
    {
        $this->repository->delete($organization);
    }

    private function rules() : array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|max:150|string',
            'foundation_date' => 'required|date',
        ];
    }
}
