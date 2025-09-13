<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'project_name'=>$this->project_name,
            'project_description'=>$this->project_description,
            'link'=>$this->link,
            'project_programming_languages'=>$this->project_programming_languages
        ];
    }
}
