<?php

namespace App\Repositories;

use App\DTOs\ExperienceDTO;
use App\Interfaces\ExperienceInterface;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

class ExperienceRepository implements ExperienceInterface
{
    public function create(ExperienceDTO $dto): Experience
    {
        return Experience::create($dto->toArray());
    }
    public function update(ExperienceDTO $dto): ?Experience
    {
        $experience = Experience::find($dto->id);
        if(!$experience) return null;

        $experience->update($dto->toArray());
        return $experience;
    }
    public function delete(String $id): bool
    {
        $experience = Experience::find($id);
        return $experience->delete() ?? false;
    }
    public function getById(String $id): ?Experience
    {
        return Experience::find($id);
    }
    public function getAll():Collection
    {
        return Experience::all();
    }
}
