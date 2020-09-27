<?php

namespace App\Services\Dto;

class DeleteEventDto extends AbstractDto implements DtoInterface
{
    public $id;

    /**
     * @return array
     */
    protected function configureValidatorRules(): array
    {
        return [
            'id' => 'required'
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function map(array $data): bool
    {
        $this->id = $data['id'];

        return true;
    }
}
