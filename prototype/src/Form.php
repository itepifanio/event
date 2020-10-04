<?php

declare(strict_types=1);

namespace Src;

use Src\PrototypeInterface;

class Form extends Tag implements PrototypeInterface
{
    private array $elements;

    public function __construct(?string $id = null, ?string $name = null)
    {
        parent::__construct($id, $name);
    }

    public function render(): string
    {
        $properties = parent::getProperties();
        $form = "<form$properties>";

        foreach ($this->elements as $element) {
            $form .= $element->render();
        }

        $form .= '</form>';

        return $form;
    }

    public function addElement(PrototypeInterface $element): void
    {
        $this->elements[] = $element;
    }

    public function __clone()
    {
        foreach ($this->elements as $index => $element) {
            $this->elements[$index] = clone $element;
        }
    }
}
