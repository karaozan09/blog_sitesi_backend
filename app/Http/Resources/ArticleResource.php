<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'article_title'=>$this->article_title,
            'article_content'=>$this->article_content,
            'article_image' =>new FileResource($this->file),
            'article_url' => $this->article_url,
            'slug'=>$this->slug,
            'article_date'=>$this->article_date
        ];
    }
}
