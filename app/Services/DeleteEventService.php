<?php

namespace App\Services;

use App\Models\Event;

class DeleteEventService extends ValidateData implements ServiceInterface
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function configureValidatorRules(): array
    {
        return ['id' => 'required'];
    }

    public function execute(): bool
    {
        Event::find($this->data['id'])->delete();

        return true;
    }
}
