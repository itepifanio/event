<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;
use Src\Tag;

class Input extends Tag implements RendarableInterface
{
    private ?string $type;

    public function __construct(string $type, ?string $id=null, ?string $name=null)
    {
        $this->type = $type;
        Tag::__construct($id, $name);
    }

    public function render(): string
    {
        $properties = $this->getProperties();
        return "<input$properties/>";
    }
    public function getProperties(?string $properties=null): string{
        if(!isset($properties)) $properties = '';
    
        if(isset($this->type)){
            $properties .= " type=\"$this->type\"";
        }   
        return parent::getProperties($properties);
    }
}