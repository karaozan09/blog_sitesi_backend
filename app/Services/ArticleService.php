<?php

namespace App\Services;

use App\DTOs\ArticleDTO;
use App\Interfaces\ArticleInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleService extends BaseService
{
    public function __construct(protected ArticleInterface $repo){}

    public function create(ArticleDTO $dto): Article
    {
        return $this->handle(fn()=> $this->repo->create($dto));
    }
    public function update(ArticleDTO $dto): ?Article
    {
        return $this->handle(fn() => $this->repo->update($dto));
    }
    public function delete(string $id): ?bool
    {
        return $this->handle(fn() => $this->repo->delete($id));
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
