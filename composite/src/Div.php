<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;
use Src\Tag;

class Div extends Tag implements RendarableInterface 
{
    /** @var RendarableInterface */
    private array $elements;
    
    public function __construct(?string $id=null, ?string $name=null)
    {
        Tag::__construct($id, $name);
    }

    public function render() : string
    {
        $properties = Tag::getProperties();
        $div = "<div$properties>";

        foreach($this->elements as $element){
            $div .= $element->render();
        }

        $div .= '</div>';

        return $div;
    }
    
    public function addElement(RendarableInterface $element) : void
    {
        $this->elements[] = $element;
    }
}