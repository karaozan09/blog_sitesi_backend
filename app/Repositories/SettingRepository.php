<?php

namespace App\Repositories;

use App\DTOs\ContactDTO;
use App\DTOs\FooterDTO;
use App\DTOs\SettingDTO;
use App\Interfaces\SettingInterface;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingRepository implements SettingInterface
{

    public function changeSettings(SettingDTO $dto): ?bool
    {
        $setting = Setting::first();
        if(!$setting) return null;

        $setting->logo = $dto->logo;
        $setting->background_image = $dto->background_image;

       return $setting->save();
    }
    public function getAll():Collection
    {
        return Setting::all();
    }
    public function changeFooter(FooterDTO $dto): ?bool
    {
        $footer = Setting::first();
        if(!$footer) return null;

        $footer->footer_title= $dto->footer_title;
        $footer->footer_text= $dto->footer_text;
       return $footer->save();
    }
    public function changeContact(ContactDTO $dto): ?bool
    {
        $contact = Setting::first();
        if(!$contact) return null;

        $contact->email= $dto->email;
        $contact->phone_number= $dto->phone_number;
        $contact->address= $dto->address;

        return $contact->save();
    }
}
