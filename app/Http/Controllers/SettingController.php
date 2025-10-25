<?php

namespace App\Http\Controllers;

use App\DTOs\ContactDTO;
use App\DTOs\FooterDTO;
use App\DTOs\SettingDTO;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\FooterRequest;
use App\Http\Requests\SettingRequest;
use App\Http\Resources\SettingResource;
use App\Services\SettingService;
use Illuminate\Http\JsonResponse;

class SettingController extends JsonResponseMessageController
{
    public function __construct(protected SettingService $service){}
    public function changeSettings(SettingRequest $request):JsonResponse
    {
        $dto = new SettingDTO(
            logo:$request->logo,
            background_image:$request->background_image
        );
        $setting = $this->service->changeSettings($dto);
        if($setting){
            return $this->updated("Ayarlar başarıyla güncellendi.");
        }
        return $this->notFound("Ayarlar kısmı bulunamadı.");
    }
    public function getAll():JsonResponse
    {
        return $this->success(data:SettingResource::collection($this->service->getAll()));
    }
    public function changeFooter(FooterRequest $request):JsonResponse
    {
        $dto = new FooterDTO(
            footer_title: $request->footer_title,
            footer_text: $request->footer_text
        );
        $footer = $this->service->changeFooter($dto);
        if($footer){
            return $this->success("Footer kısmı başarıyla değiştirildi.");
        }
        return $this->error();
    }
    public function changeContact(ContactRequest $request):JsonResponse
    {
        $dto = new ContactDTO(
            email: $request->email,
            phone_number: $request->phone_number,
            address: $request->address
        );
        $contact = $this->service->changeContact($dto);
        if($contact){
            return $this->success("İletişim bilgileri başarıyla değiştirildi.");
        }
        return $this->error();
    }
}
