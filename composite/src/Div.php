<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;

class Div implements RendarableInterface
{
    /** @var RendarableInterface */
    private array $elements;
    private ?string $id;
    private ?string $name;
    
    public function __construct($id=null, $name=null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function render() : string
    {
        $properties = $this->getProperties();
        $div = "<div$properties>";

        foreach($this->elements as $element){
            $div .= $element->render();
        }

        $div .= '</div>';

        return $div;
    }
    
    public function getProperties(): string{
        $properties = '';
        if(isset($this->id)){
            $properties .= " id=\"$this->id\"";
        }
        if(isset($this->name)){
            $properties .= " name=\"$this->name\"";
        }        
        return $properties;
    }
    public function addElement(RendarableInterface $element) : void
    {
        $this->elements[] = $element;
    }
}