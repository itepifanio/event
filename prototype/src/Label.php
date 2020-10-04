<?php

declare(strict_types=1);

namespace Src;

use Src\PrototypeInterface;

class Label extends Tag implements PrototypeInterface
{
    public function __construct(string $id, string $text)
    {
        $this->text = $text;
        parent::__construct($id, null);
    }

    public function render(): string
    {
        $properties = parent::getProperties();

        return "<label$properties>{$this->text}</label>";
    }

    public function __clone()
    {
        $this->text = 'Copy of ' . ($this->text ?? '');
    }
}
