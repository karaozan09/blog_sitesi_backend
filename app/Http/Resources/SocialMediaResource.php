<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialMediaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'social_media_platform'=>$this->social_media_platform,
            'social_media_icon'=>$this->social_media_icon,
            'social_media_url'=>$this->social_media_url
        ];
    }
}
