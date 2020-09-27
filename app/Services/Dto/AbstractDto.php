<?php

namespace App\Services\Dto;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

abstract class AbstractDto
{
    /**
     * AbstractRequestDto constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        // We create a validator, with all the data we receive.
        // The rules come from the child class.
        $validator = Validator::make(
            $data,
            $this->configureValidatorRules()
        );

        // We now validate the data we receive, for this DTO.
        // If it fails we throw an exception.
        if (!$validator->validate()) {
            throw new InvalidArgumentException(
                'Error: ' . $validator->errors()->first()
            );
        }

        // The data is valid.
        // Now we map it.
        if (!$this->map($data)) {
            throw new InvalidArgumentException('The mapping failed');
        }
    }

    /* @return array */
    abstract protected function configureValidatorRules(): array;

    /**
     * @param array $data
     * @return bool
     */
    abstract protected function map(array $data): bool;
}
