<?php declare(strict_types=1);

namespace Src;

interface NewRendarableInterface 
{
    public function render(): string;
    public function setId(string $id) : void;
    public function setName(string $name) : void;
    public function getProperties(): string;
}
