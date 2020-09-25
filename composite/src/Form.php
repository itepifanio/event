<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;

class Form implements RendarableInterface
{
    /** @var RendarableInterface */
    private array $elements;

    public function render() : string
    {
        $form = '<form>';

        foreach($this->elements as $element){
            $form .= $element->render();
        }

        $form .= '</form>';

        return $form;
    }

    public function addElement(RendarableInterface $element) : void
    {
        $this->elements[] = $element;
    }
}