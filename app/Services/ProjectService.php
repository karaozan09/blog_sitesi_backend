<?php

namespace App\Services;

use App\DTOs\ProjectDTO;
use App\Interfaces\ProjectInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectService extends BaseService
{
    public function __construct(Protected ProjectInterface $repo){}

    public function create(ProjectDTO $dto): Project
    {
        return $this->handle(fn()=>$this->repo->create($dto));
    }
    public function update(ProjectDTO $dto): ?Project
    {
        return $this->handle(fn()=>$this->repo->update($dto));
    }
    public function delete(string $id): bool
    {
        return $this->handle(fn()=>$this->repo->delete($id));
    }
    public function getById(string $id): ?Project
    {
        return $this->repo->getById($id);
    }
    public function getAll():Collection
    {
        return $this->repo->getAll();
    }
}
