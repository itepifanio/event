<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

abstract class ValidateData
{
    public function validator()
    {
        $validator = Validator::make(
            $this->data,
            $this->configureValidatorRules()
        );

        if (!$validator->validate()) {
            throw new InvalidArgumentException(
                'Error: ' . $validator->errors()->first()
            );
        }
    }

    abstract protected function configureValidatorRules(): array;
}
