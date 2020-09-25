<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;

class Label implements RendarableInterface
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return "<label>{$this->text}</label>";
    }
}