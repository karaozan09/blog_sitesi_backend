<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

class ExperienceDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $experience_name,
        public readonly string $company_name,
        public readonly string $experience_description,
        public readonly string $start_date,
        public readonly string $end_date,
        public readonly ?UploadedFile $experience_image
    )
    {}
    public function toArray():array
    {
        return [
        'experience_name' => $this->experience_name,
            'company_name' => $this->company_name,
            'experience_description' => $this->experience_description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            ];
    }
}
