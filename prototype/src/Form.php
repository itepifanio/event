<?php declare(strict_types=1);

namespace Src;

use Src\PrototypeInterface;

class Form extends Tag implements PrototypeInterface
{
    private array $elements;

    public function __construct(?Form $form=null)
    {
        if($form){
            Tag::__construct($form->id, $form->name);
        }
    }

    public function render() : string
    {
        $properties = Tag::getProperties();
        $form = "<form$properties>";

        foreach($this->elements as $element){
            $form .= $element->render();
        }

        $form .= '</form>';

        return $form;
    }

    public function addElement(PrototypeInterface $element) : void
    {
        $this->elements[] = $element;
    }


    public function clone(): PrototypeInterface
    {
        return new Form(this);
    }
}
