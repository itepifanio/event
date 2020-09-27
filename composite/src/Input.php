<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;

class Input implements RendarableInterface
{
    private ?string $name;
    private ?string $type;
    private ?string $id;

    public function __construct($type, $id=null, $name=null)
    {

        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
    }

    public function render(): string
    {
        $properties = $this->getProperties();
        return "<input$properties/>";
    }
    public function getProperties(): string{
        $properties = "";
    
        if(isset($this->type)){
            $properties .= " type=\"$this->type\"";
        }   
        if(isset($this->id)){
            $properties .= " id=\"$this->id\"";
        }
        if(isset($this->name)){
            $properties .= " name=\"$this->name\"";
        }  
        return $properties;
    }
}