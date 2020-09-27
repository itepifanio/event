<?php

namespace App\Services\Dto;

class EditOrganizationDto extends AbstractDto implements DtoInterface
{
    public $name;
    public $email;
    public $desciption;
    public $fundation_date;

    /**
     * @return array
     */
    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'foundation_date' => 'required|date',
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
        $this->description = $data['description'];
        $this->foundation_date = $data['foundation_date'];

        return true;
    }

    /**
     * @return array
     */
    public function toArray(): array {
        return (array) $this;
    }
}
