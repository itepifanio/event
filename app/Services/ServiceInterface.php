<?php

namespace App\Services;

interface ServiceInterface
{
    /**
     * @return bool
     */
    public function execute(): bool;

    /**
     * @param DtoInterface $dto
     * @return ServiceInterface
     */
    public static function make(DtoInterface $dto): ServiceInterface;
}
