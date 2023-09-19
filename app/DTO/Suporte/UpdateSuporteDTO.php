<?php

namespace App\DTO\Suporte;

use App\Http\Requests\StoreEditSuporte;

class UpdateSuporteDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $body,
    ){}

    public static function makeFromRequest(StoreEditSuporte $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            'a',
            $request->body,
        );
    }
}