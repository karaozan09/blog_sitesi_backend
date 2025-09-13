<?php

namespace App\Interfaces;

use App\DTOs\Social_MediaDTO;
use App\Models\Social_Media;
use Illuminate\Database\Eloquent\Collection;

interface SocialMediaInterface
{
    public function create(Social_MediaDTO $dto):Social_Media;
    public function update(Social_MediaDTO $dto):?Social_Media;
    public function delete(string $id): bool;
    public function getByID(string $id): ?Social_Media;
    public function getAll():Collection;
}
