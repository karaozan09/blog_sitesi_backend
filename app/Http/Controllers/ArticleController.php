<?php

namespace App\Http\Controllers;

use App\DTOs\ArticleDTO;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;
class ArticleController extends JsonResponseMessageController
{
    public function __construct(protected ArticleService $service){}
    public function create(ArticleRequest $request):JsonResponse
    {
        $dto = new ArticleDTO(
            id:null,
            article_title:$request->article_title,
            article_content:$request->article_content,
            article_image: $request->article_image,
            article_url: $request->article_url,
            article_date:$request->article_date
        );
        $article = $this->service->create($dto);
        if($article){
            return $this->created("Makale Başarıyla Oluşturuldu.",new ArticleResource($article));
        }
        return $this->error();
    }
    public function update(string $id,ArticleRequest $request):JsonResponse
    {
        $dto = new ArticleDTO(
            id:$id,
            article_title: $request->article_title,
            article_content:$request->article_content,
            article_image: $request->article_image,
            article_url: $request->article_url,
            article_date:$request->article_date
        );
        $article = $this->service->update($dto);
        if($article){
            return $this->updated("Makale Başarıyla Güncellendi.",new ArticleResource($article));
        }
        return $this->notFound("Makale Bulunamadı.");
    }
    public function delete(string $id):JsonResponse
    {
        if($this->service->delete($id)){
            return $this->deleted("Makale Başarıyla Silindi.");
        }
        return $this->notFound("Makale Bulunamadı.");
    }
    public function getById(string $id):JsonResponse
    {
        $article = $this->service->getById($id);
        if($article){
            return $this->success(data:new ArticleResource($article));
        }
        return $this->notFound("Makale Bulunamadı.");
    }
    public function getAll():JsonResponse
    {
        return $this->success(data:ArticleResource::collection($this->service->getAll()));
    }
}

