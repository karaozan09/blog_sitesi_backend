<?php

namespace App\DTOs;

class ArticleDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $article_title,
        public readonly string $article_content,
        public readonly string $slug,
        public readonly string $article_date,
    ){}
    public function toArray(): array
    {
        return [
            "article_title" => $this->article_title,
            "article_content" => $this->article_content,
            "slug" => $this->slug,
            "article_date" => $this->article_date,
        ];
    }
}
