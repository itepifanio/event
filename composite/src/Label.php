<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;

class Label implements RendarableInterface
{
   
    private ?string $name;
    private ?string $text;
    private ?string $id;

    public function __construct(string $text, $id=null, $name=null)
    {
        $this->text = $text;
        $this->id = $id;
        $this->name = $name;
    }

    public function render(): string
    {
        $properties = $this->getProperties();
        return "<label$properties>{$this->text}</label>";
    }
    public function getProperties(): string{
        $properties = "";
        if(isset($this->id)){
            $properties .= " id=\"$this->id\"";
        }
        if(isset($this->name)){
            $properties .= " name=\"$this->name\"";
        } 
        return $properties;
    }
}