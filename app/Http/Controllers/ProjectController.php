<?php

namespace App\Http\Controllers;

use App\DTOs\ProjectDTO;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;
class ProjectController extends JsonResponseMessageController
{
    public function __construct(protected ProjectService $service){}

    public function create(ProjectRequest $request)
    {
        $dto = new ProjectDTO(
            id:null,
            project_name:$request->project_name,
            project_description:$request->project_description,
            link:$request->link,
            project_programming_languages:$request->project_programming_languages
        );
        $project = $this->service->create($dto);
        if($project){
            return $this->created("Proje Başarıyla Oluşturuldu.",new ProjectResource($project));
        }
        return $this->error();
    }
    public function update(string $id, ProjectRequest $request):JsonResponse
    {
        $dto = new ProjectDTO(
            id:$id,
            project_name: $request->project_name,
            project_description: $request->project_description,
            link:$request->link,
            project_programming_languages: $request->project_programming_languages
        );
        $project = $this->service->update($dto);
        if($project){
            return $this->updated("Proje Başarıyla Güncellendi.",new ProjectResource($project));
        }
        return $this->notFound("Proje Bulunamadı.");
    }
    public function delete(string $id):JsonResponse
    {
        if($this->service->delete($id)){
            return $this->deleted("Proje Başarıyla Silindi.");
        }
        return $this->notFound("Proje Bulunamadı.");
    }
    public function getById(string $id):JsonResponse
    {
        $project = $this->service->getById($id);
        if($project){
            return $this->success(data:new ProjectResource($project));
        }
        return $this->notFound("Proje Bulunamadı.");
    }
    public function getAll():JsonResponse
    {
        return $this->success(data:ProjectResource::collection($this->service->getAll()));
    }
}
