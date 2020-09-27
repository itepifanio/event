<?php

namespace App\Services\Dto;

class EditOrganizationDto extends AbstractDto implements DtoInterface
{
    public $id;
    public $name;
    public $email;
    public $description;
    public $foundation_date;

    /**
     * @return array
     */
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

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->id = $data['id'];
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
