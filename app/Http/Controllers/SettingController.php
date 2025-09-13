<?php

namespace App\Http\Controllers;

use App\DTOs\SettingDTO;
use App\Http\Requests\SettingRequest;
use App\Http\Resources\SettingResource;
use App\Services\SettingService;
use Illuminate\Http\JsonResponse;

class SettingController extends JsonResponseMessageController
{
    public function __construct(protected SettingService $service){}

    public function create(SettingRequest $request):JsonResponse
    {
        $dto = new SettingDTO(
            id:null,
            logo: $request->logo,
            background_image: $request->background_image,
            footer_title: $request->footer_title,
            footer_text: $request->footer_text,
            email: $request->email,
            phone_number: $request->phone_number,
            address: $request->address
        );
        $setting = $this->service->create($dto);
        if($setting){
            return $this->created("Ayarlar başarıyla oluşturuldu.", new SettingResource($setting));
        }
        return $this->error();
    }
    public function update(string $id,SettingRequest $request):JsonResponse
    {
        $dto = new SettingDTO(
            id:$id,
            logo:$request->logo,
            background_image:$request->background_image,
            footer_title: $request->footer_title,
            footer_text: $request->footer_text,
            email: $request->email,
            phone_number: $request->phone_number,
            address: $request->address
        );
        $setting = $this->service->update($dto);
        if($setting){
            return $this->updated("Ayarlar başarıyla güncellendi.", new SettingResource($setting));
        }
        return $this->notFound("Ayarlar kısmı bulunamadı.");
    }
    public function delete(string $id):JsonResponse
    {
        if($this->service->delete($id)){
            return $this->deleted("Ayarlar kısmı başarıyla silindi.");
        }
        return $this->notFound("Ayarlar kısmı bulunamadı.");
    }
    public function getAll():JsonResponse
    {
        return $this->success(data:SettingResource::collection($this->service->getAll()));
    }
}
