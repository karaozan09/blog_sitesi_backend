<?php

namespace App\DTOs;

class SkillDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $skill_name,
        public readonly string $skill_image
    )
    {}
    public function toArray():array
    {
        return [
            'skill_name' => $this->skill_name,
            'skill_image' => $this->skill_image
        ];
    }
}
