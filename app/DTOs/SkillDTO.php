<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

class SkillDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $skill_name,
        public readonly ?UploadedFile $skill_image
    )
    {}
    public function toArray():array
    {
        return [
            'skill_name' => $this->skill_name
        ];
    }
}
