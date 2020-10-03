<?php declare(strict_types=1);

namespace Src;

interface PrototypeInterface
{
    public function render(): string;

    public function clone(): PrototypeInterface;
}
