<?php

namespace App\Http\Controllers;

use App\DTOs\AboutDTO;
use App\Http\Requests\AboutRequest;
use App\Http\Resources\AboutResource;
use App\Services\AboutService;
use Illuminate\Http\JsonResponse;

class AboutController extends JsonResponseMessageController
{
    public function __construct(protected AboutService $service){}

    public function create(AboutRequest $request):JsonResponse
    {
        $dto = new AboutDTO(
            id:null,
            full_name:$request->full_name,
            title:$request->title,
            about:$request->about
        );
        $about = $this->service->create($dto);
        if($about){
            return $this->created("Hakkımda kısmı başarıyla oluşturuldu.", new AboutResource($about));
        }
        return $this->error();
    }
    public function update(string $id, AboutRequest $request):JsonResponse
    {
        $dto = new AboutDTO(
            id:$id,
            full_name: $request->full_name,
            title: $request->title,
            about: $request->about
        );
        $about = $this->service->update($dto);
        if($about){
            return $this->updated("Hakkımda kısmı başarıyla güncellendi.", new AboutResource($about));
        }
        return $this->notFound("Hakkımda kısmı bulunamadı");
    }
    public function delete(string $id): JsonResponse
    {
        if($this->service->delete($id)){
            return $this->deleted("Hakkımda kısmı başarıyla silindi");
        }
        return $this->notFound("Hakkımda kısmı bulunamadı");
    }
    public function getAll(): JsonResponse
    {
        return $this->success(data:AboutResource::collection($this->service->getAll()));
    }
}
