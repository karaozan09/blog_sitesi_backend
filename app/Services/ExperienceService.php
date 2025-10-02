<?php

namespace App\Services;

use App\DTOs\ExperienceDTO;
use App\Interfaces\ExperienceInterface;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

class ExperienceService extends BaseService
{
    public function __construct(protected ExperienceInterface $repo){}
    public function create(ExperienceDTO $dto): Experience
    {
        return $this->handle(fn() => $this->repo->create($dto));
    }
    public function update(ExperienceDTO $dto): ?Experience
    {
        return $this->handle(fn() => $this->repo->update($dto));
    }
    public function delete(String $id):?bool
    {
        return $this->handle(fn() => $this->repo->delete($id));
    }
    public function getById(String $id): ?Experience
    {
        return $this->handle(fn() => $this->repo->getById($id));
    }
    public function getAll():Collection
    {
        return $this->repo->getAll();
    }
}
