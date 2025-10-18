<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

class Social_MediaDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $social_media_platform,
        public readonly ?UploadedFile $social_media_icon,
        public readonly string $social_media_url,
    ){}
    public function toArray(): array
    {
       return [
            "social_media_platform" => $this->social_media_platform,
            "social_media_url" => $this->social_media_url,
        ];

    }
}
