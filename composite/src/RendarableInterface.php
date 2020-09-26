<?php declare(strict_types=1);

namespace Src;

interface RendarableInterface 
{
    public function render(): string;
    public function getProperties(): string;
}
