<?php

namespace App\Http\Controllers;

use App\DTOs\SkillDTO;
use App\Http\Requests\SkillRequest;
use App\Http\Resources\SkillResource;
use App\Services\SkillService;
use Illuminate\Http\JsonResponse;

class SkillController extends JsonResponseMessageController
{
    public function __construct(protected SkillService $service){}
    public function create(SkillRequest $request):JsonResponse{
        $dto = new SkillDTO(
            id:null,
            skill_name:$request->skill_name,
            skill_image: $request->skill_image
        );
        $skill = $this->service->create($dto);
        if($skill){
            return $this->created("Yetenek başarıyla eklendi.", new SkillResource($skill));
        }
        return $this->error();
    }
    public function update(String $id,SkillRequest $request):JsonResponse
    {
     $dto = new SkillDTO(
         id:$id,
         skill_name:$request->skill_name,
         skill_image:$request->skill_image
     );
     $skill = $this->service->update($dto);
     if($skill){
         return $this->updated("Yetenek başarıyla güncellendi.",new SkillResource($skill));
     }
     return $this->notFound("Yetenek bulunamadı.");
    }
    public function delete(String $id):JsonResponse
    {
        if($this->service->delete($id)){
            return $this->deleted("Yetenek başarıyla silindi.");
        }
        return $this->notFound("Yetenek bulunamadı.");
    }
    public function getById(String $id):JsonResponse
    {
        $skill = $this->service->getById($id);
        if($skill){
            return $this->success(data: new SkillResource($skill));
        }
        return $this->notfound("Yetenek bulunamadı.");
    }
    public function getAll():JsonResponse
    {
        return $this->success(data: SkillResource::collection($this->service->getAll()));
    }
}
