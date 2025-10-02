<?php

namespace App\Repositories;

use App\DTOs\ArticleDTO;
use App\Interfaces\ArticleInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleInterface
{
    public function create(ArticleDTO $dto,$slug): Article
    {
        return Article::create($dto->toArray($slug));
    }
    public function update(ArticleDTO $dto): ?Article
    {
        $article = Article::find($dto->id);
        if(!$article) return null;

        return $article->update($dto->toArray());
    }
    public function delete(string $id): bool
    {
        $article = Article::find($id);
        return $article->delete() ?? false;
    }
    public function getById(string $id): ?Article
    {
        return Article::find($id);
    }
    public function getAll(): Collection
    {
        return Article::all();
    }
}
