<?php declare(strict_types=1);

namespace Src;

use Src\PrototypeInterface;

class Input implements PrototypeInterface
{
    public ?string $id;
    public ?string $name;
    public ?string $type;
    public ?string $placeholder;

    public function __construct(?Input $input=null)
    {
        if($input) {
            $this->id = $input->id;
            $this->name = $input->name;
            $this->type = $input->type;
            $this->placeholder = $input->placeholder;
        }
    }

    public function render(): string
    {
        $properties = $this->getProperties();

        return "<input$properties/>";
    }

    public function getProperties(?string $properties=null): string {
        $properties = '';

        if(isset($this->id)){
            $properties .= " id=\"$this->id\"";
        }

        if(isset($this->name)){
            $properties .= " name=\"$this->name\"";
        }

        if(isset($this->type)){
            $properties .= " type=\"$this->type\"";
        }

        if(isset($this->placeholder)){
            $properties .= " placeholder=\"$this->placeholder\"";
        }

        return $properties;
    }

    public function clone(): PrototypeInterface
    {
        return new Input($this);
    }
}
