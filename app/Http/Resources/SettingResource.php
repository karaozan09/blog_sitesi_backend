<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'logo'=>$this->logo,
            'backgroun_image'=>$this->background_image,
            'footer_title'=>$this->footer_title,
            'footer_text'=>$this->footer_text,
            'email'=>$this->email,
            'phone_number'=>$this->phone_number,
            'address'=>$this->address
        ];
    }
}
