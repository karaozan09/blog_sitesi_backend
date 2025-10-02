<?php

namespace App\DTOs;

class ContactDTO
{
    public function __construct(
        public readonly ?string $email,
        public readonly ?string $phone_number,
        public readonly ?string $address
    )
    {}
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address
        ];
    }
}
