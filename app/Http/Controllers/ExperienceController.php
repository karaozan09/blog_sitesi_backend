<?php

namespace App\Http\Controllers;

use App\DTOs\ExperienceDTO;
use App\Http\Requests\ExperienceRequest;
use App\Http\Resources\ExperienceResource;
use App\Services\ExperienceService;
use Illuminate\Http\JsonResponse;

class ExperienceController extends JsonResponseMessageController
{
    public function __construct(protected ExperienceService $service){}
    public function create(ExperienceRequest $request):JsonResponse
    {
        $dto = new ExperienceDTO(
            id:null,
            experience_name: $request->experience_name,
            company_name:$request->company_name,
            experience_description: $request->experience_description,
            start_date:$request->start_date,
            end_date:$request->end_date,
            experience_image:$request->experience_image,
        );
        $experience = $this->service->create($dto);
        if($experience){
            return $this->created("Deneyim başarıyla eklendi.", new ExperienceResource($experience));
        }
        return $this->error();
    }
    public function update(String $id,ExperienceRequest $request):JsonResponse
    {
        $dto = new ExperienceDTO(
            id:$id,
            experience_name: $request->experience_name,
            company_name: $request->company_name,
            experience_description:$request->company_name,
            start_date: $request->start_date,
            end_date: $request->end_date,
            experience_image: $request->experience_image
        );
        $experience = $this->service->update($dto);
        if($experience){
            return $this->updated("Deneyim başarıyla güncellendi.",new ExperienceResource($experience));
        }
        return $this->notFound("Deneyim bulunamadı.");
    }
    public function delete(String $id):JsonResponse
    {
        if($this->service->delete($id)){
            return $this->deleted("Deneyim başarıyla silindi.");
        }
        return $this->notFound("Deneyim bulunamadı.");
    }
    public function getById(string $id):JsonResponse
    {
        $experience = $this->service->getById($id);
        if($experience){
            return $this->success(data: new ExperienceResource($experience));
        }
        return $this->notFound("Deneyim bulunamadı.");
    }
    public function getAll():JsonResponse
    {
        return $this->success(data: ExperienceResource::collection($this->service->getAll()));
    }
}
