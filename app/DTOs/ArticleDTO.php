<?php

namespace App\DTOs;

class ArticleDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $article_title,
        public readonly string $article_content,
        public readonly string $article_image,
        public readonly string $article_url,
//        public readonly string $slug,
        public readonly string $article_date,
    ){}
    public function toArray(string $slug): array
    {
        return [
            "article_title" => $this->article_title,
            "article_content" => $this->article_content,
            "article_image" => $this->article_image,
            "article_url" => $this->article_url,
            "slug" => $slug,
            "article_date" => $this->article_date,
        ];
    }
}
