<?php

namespace App\Http\Controllers;

use App\DTOs\Social_MediaDTO;
use App\Http\Requests\SocialMediaRequest;
use App\Http\Resources\SocialMediaResource;
use App\Services\SocialMediaService;
use Illuminate\Http\JsonResponse;
class SocialMediaController extends JsonResponseMessageController
{
    public function __construct(protected SocialMediaService $service){}

    public function create(SocialMediaRequest $request)
    {
        $dto = new Social_MediaDTO(
            id:null,
            social_media_platform: $request->social_media_platform,
            social_media_icon: $request->social_media_icon,
            social_media_url: $request->social_media_url
        );
        $social_media = $this->service->create($dto);
        if($social_media){
            return $this->created("Sosyal Medya Başarıyla Oluşturuldu.",new SocialMediaResource($social_media));
        }
        return $this->error();
    }
    public function update(string $id,SocialMediaRequest $request):JsonResponse
    {
        $dto = new Social_MediaDTO(
            id:$id,
            social_media_platform: $request->social_media_platform,
            social_media_icon: $request->social_media_icon,
            social_media_url: $request->social_media_url
        );
        $social_media = $this->service->update($dto);
        if($social_media){
            return $this->updated("Sosyal Medya Güncellendi.",new SocialMediaResource($social_media));
        }
        return $this->notFound("Sosyal Medya Bulunamadı.");
    }
    public function delete(string $id):JsonResponse
    {
        if($this->service->delete($id)){
            return $this->deleted("Sosyal Medya Silindi.");
        }
        return $this->notFound("Sosyal Medya Bulunamadı.");
    }
    public function getById(string $id):JsonResponse
    {
        $social_media = $this->service->getById($id);
        if($social_media){
            return $this->success(data:new SocialMediaResource($social_media));
        }
        return $this->notFound("Sosyal Medya Bulunamadı.");
    }
    public function getAll():JsonResponse
    {
        return $this->success(data:SocialMediaResource::collection($this->service->getAll()));
    }
}
