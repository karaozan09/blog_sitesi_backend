<?php

namespace App\Interfaces;

use App\DTOs\ExperienceDTO;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

Interface ExperienceInterface
{
    public function create(ExperienceDTO $dto): Experience;
    public function update(ExperienceDTO $dto): ?Experience;
    public function delete(string $id): bool;
    public function getById(String $id): ?Experience;
    public function getAll():Collection;
}
