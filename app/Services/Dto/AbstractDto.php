<?php

namespace App\Services\Dto;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

abstract class AbstractDto
{
    public function __construct(array $data)
    {
        $validator = Validator::make(
            $data,
            $this->configureValidatorRules()
        );

        if (!$validator->validate()) {
            throw new InvalidArgumentException(
                'Error: ' . $validator->errors()->first()
            );
        }

        if (!$this->map($data)) {
            throw new InvalidArgumentException('The mapping failed');
        }
    }

    abstract protected function configureValidatorRules(): array;

    abstract protected function map(array $data): bool;

    public function toArray(): array {
        return (array) $this;
    }
}
