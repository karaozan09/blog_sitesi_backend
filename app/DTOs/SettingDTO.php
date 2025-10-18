<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

class SettingDTO
{
    public function __construct(
        public readonly ?UploadedFile $logo,
        public readonly ?UploadedFile $background_image
    ){}
    public function toArray(): array
    {
        return [];
    }
}
