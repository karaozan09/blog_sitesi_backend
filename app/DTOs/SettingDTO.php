<?php

namespace App\DTOs;

class SettingDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $logo,
        public readonly string $background_image,
        public readonly string $footer_title,
        public readonly string $footer_text,
        public readonly string $email,
        public readonly string $phone_number,
        public readonly string $address
    ){}
    public function toArray(): array
    {
        return [
            'logo' => $this->logo,
            'background_image' => $this->background_image,
            'footer_title' => $this->footer_title,
            'footer_text' => $this->footer_text,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address
        ];
    }
}
