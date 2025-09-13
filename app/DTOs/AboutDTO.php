<?php

namespace App\DTOs;

class AboutDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $full_name,
        public readonly string $title, //Meslek
        public readonly string $about,
    ){}
    public function toArray(): array
    {
        return [
            "full_name" => $this->full_name,
            "title" => $this->title,
            "about" => $this->about,
        ];
    }
}
