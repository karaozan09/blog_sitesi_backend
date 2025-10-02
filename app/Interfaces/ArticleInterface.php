<?php

namespace App\Interfaces;

use App\DTOs\ArticleDTO;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleInterface
{
    public function create(ArticleDto $dto,$slug): Article;
    public function update(ArticleDto $dto): ?Article;
    public function delete(string $id): bool;
    public function getById(string $id): ?Article;
    public function getAll():Collection;
}
