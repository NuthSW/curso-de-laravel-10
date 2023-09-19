<?php

namespace App\DTO\Suporte;

use App\Http\Requests\StoreEditSuporte;

class CreateSuporteDTO
{
    public function __construct(
        public string $subject,
        public string $status,
        public string $body,
    ){}

    public static function makeFromRequest(StoreEditSuporte $request): self
    {
        return new self(
            $request->subject,
            'a',
            $request->body,
        );
    }
}