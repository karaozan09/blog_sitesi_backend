<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'experience_name'=>$this->experience_name,
            'company_name' => $this->company_name,
            'experience_description' => $this->experience_description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'experience_image' => $this->experience_image
        ];
    }
}
