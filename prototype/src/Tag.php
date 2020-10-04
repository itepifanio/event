<?php

declare(strict_types=1);

namespace Src;

class Tag
{
    private ?string $id;
    private ?string $name;

    public function __construct(?string $id = null, ?string $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getProperties(?string $properties = null): string
    {

        echo $properties;
        // $properties = '';
        if (!isset($properties)) $properties = '';

        if (isset($this->id)) {
            $properties .= " id=\"$this->id\"";
        }
        if (isset($this->name)) {
            $properties .= " name=\"$this->name\"";
        }
        return $properties;
    }
}
