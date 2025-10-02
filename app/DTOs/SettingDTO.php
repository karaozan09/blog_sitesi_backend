<?php

namespace App\DTOs;

class SettingDTO
{
    public function __construct(
        public readonly ?string $logo,
        public readonly ?string $background_image
    ){}
    public function toArray(): array
    {
        return [
            'logo' => $this->logo,
            'background_image' => $this->background_image
        ];
    }
}
