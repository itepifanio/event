<?php declare(strict_types=1);

namespace Src;

use Src\PrototypeInterface;

class Label implements PrototypeInterface
{
    public ?string $id;
    public ?string $text;

    public function __construct(?Label $label=null)
    {
        if($label) {
            $this->id = $label->id;
            $this->text = $label->text;
        }
    }

    public function render(): string
    {
        $properties = '';

        if(isset($this->id)){
            $properties .= " id=\"$this->id\"";
        }
        return "<label$properties>{$this->text}</label>";
    }

    public function clone(): PrototypeInterface
    {
        return new Label($this);
    }
}
