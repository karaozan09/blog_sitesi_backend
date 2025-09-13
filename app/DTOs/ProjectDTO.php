<?php

namespace App\DTOs;

class ProjectDTO
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $project_name,
        public readonly string $project_description,
        public readonly string $link, //githublinki
        public readonly ?array $project_programming_languages,
    ){}

    public function toArray(): array
    {
        return [
            "project_name" => $this->project_name,
            "project_description" => $this->project_description,
            "link" => $this->link,
            "project_programming_languages" => $this->project_programming_languages,
        ];
    }
}
