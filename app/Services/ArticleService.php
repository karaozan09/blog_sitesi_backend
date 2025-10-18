<?php

namespace App\Services;

use App\DTOs\ArticleDTO;
use App\Interfaces\ArticleInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ArticleService extends BaseService
{
    public function __construct(protected ArticleInterface $repo, protected FileService $fileService){}

    public function create(ArticleDTO $dto): Article
    {
        return $this->handle(function () use ($dto){
            $folder_name = 'articles';

            $fileData = $this->fileService->uploadSingleFile($dto->article_image, $folder_name);
            $slug = Str::slug($dto->article_title);
            $article = $this->repo->create($dto, $slug);
            if($article){
                $article->file()->create($fileData);
            }
            return $article;
    });
    }
    public function update(ArticleDTO $dto): ?Article
    {
        return $this->handle(function () use ($dto){
            $article = Article::find($dto->id);

            if($dto->article_image){
                $folder_name = 'articles';

                // ✅ Slug başlıktan tekrar oluşturuluyor
                $slug = \Illuminate\Support\Str::slug($dto->article_title);

                if($article->file){
                    $this->fileService->deleteFile($article->file->file_path);
                    $article->file()->delete();
                }
                $fileData = $this->fileService->uploadSingleFile($dto->article_image, $folder_name);
                $article->file()->create($fileData);
            }
            $article = $this->repo->update($dto,$slug);
            return $article;
        });
    }
    public function delete(string $id): ?bool
    {
        return $this->handle(function () use ($id){
            $article = Article::find($id);
            if($article->file){
                $this->fileService->deleteFile($article->file->file_path);
                $article->file()->delete();
            }
            return $this->repo->delete($id);
        });
    }
    public function getById(string $id): ?Article
    {
        return $this->repo->getById($id);
    }
    public function getAll():Collection
    {
        return $this->repo->getAll();
    }
}
