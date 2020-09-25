<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;

class Div implements NewRendarableInterface
{
    /** @var RendarableInterface */
    private array $elements;
    private string $id;
    private string $name;
    
    
    public function render() : string
    {
        $properties = $this->getProperties();
        $div = "<div $properties>";

        foreach($this->elements as $element){
            $div .= $element->render();
        }

        $div .= '</div>';

        return $div;
    }
    public function setId(string $id) : void
    {
        $this->id = $id;
    }
    public function setName(string $name) : void
    {
        $this->id = $id;
    }
    public function getProperties(): string{
        $properties = '';
        if(isset($this->id)){
            $properties .= "id=$this->id ";
        }
        if(isset($this->name)){
            $properties .= "name=$this->name ";
        }        
        return $properties;
    }
    public function addElement(RendarableInterface $element) : void
    {
        $this->elements[] = $element;
    }
}