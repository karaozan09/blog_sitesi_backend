<?php

namespace App\DTOs;

class FooterDTO
{
    public function __construct(
        public readonly ?string $footer_title,
        public readonly ?string $footer_text
    )
    {}
    public function toArray():array{
        return[
            'footer_title' => $this->footer_title,
            'footer_text' => $this->footer_text,
        ];
    }
}
