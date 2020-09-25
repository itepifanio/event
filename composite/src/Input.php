<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;

class Input implements RendarableInterface
{
    private string $name;
    private string $type;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function render(): string
    {
        return "<input type=\"{$this->type}\" name=\"{$this->name}\" />";
    }
}