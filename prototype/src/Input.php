<?php

declare(strict_types=1);

namespace Src;

use Src\PrototypeInterface;

class Input extends Tag implements PrototypeInterface
{
    public ?string $type;
    public ?string $placeholder;

    public function __construct(string $id, string $name, string $type, string $placeholder)
    {
        $this->type = $type;
        $this->placeholder = $placeholder;
        parent::__construct($id, $name);
    }

    public function render(): string
    {
        $properties = $this->getProperties();

        return "<input$properties/>";
    }

    public function getProperties(?string $properties = null): string
    {
        $properties = '';

        $properties = parent::getProperties($properties);

        if (isset($this->type)) {
            $properties .= " type=\"$this->type\"";
        }

        if (isset($this->placeholder)) {
            $properties .= " placeholder=\"$this->placeholder\"";
        }

        return $properties;
    }

    public function __clone()
    {
        $this->placeholder = 'Copy of ' . ($this->placeholder ?? '');
    }
}
