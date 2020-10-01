<?php

namespace App\Services;

use App\Services\Dto\DtoInterface;

interface ServiceInterface
{
    public function execute(): bool;

    public static function make(DtoInterface $dto): ServiceInterface;
}
