<?php

namespace App\Repositories;

use App\DTOs\ProjectDTO;
use App\Interfaces\ProjectInterface;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository implements ProjectInterface
{
    public function create(ProjectDTO $dto):Project
    {
        return Project::create($dto->toArray());
    }
    public function update(ProjectDTO $dto):?Project
    {
        $project = Project::find($dto->id);
        if(!$project) return null;

        $project->update($dto->toArray());
        return $project;
    }
    public function delete(string $id):bool
    {
        $project = Project::find($id);
        return $project->delete() ?? false;
    }
    public function getByID(string $id): ?Project
    {
        return Project::find($id);
    }
    public function getAll(): Collection
    {
        return Project::all();
    }
}
