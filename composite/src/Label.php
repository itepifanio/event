<?php declare(strict_types=1);

namespace Src;

use Src\RendarableInterface;
use Src\Tag;

class Label extends Tag implements RendarableInterface
{
    private ?string $text;

    public function __construct(string $text, ?string $id=null, ?string $name=null)
    {
        $this->text = $text;
        Tag::__construct($id, $name);
    }

    public function render(): string
    {
        $properties = Tag::getProperties();
        return "<label$properties>{$this->text}</label>";
    }
}