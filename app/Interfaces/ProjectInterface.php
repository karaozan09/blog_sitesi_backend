<?php

namespace App\Interfaces;

use App\DTOs\ProjectDTO;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

interface ProjectInterface
{
    public function create (ProjectDTO $dto):Project;
    public function update (ProjectDTO $dto):?Project;
    public function delete (string $id):bool;
    public function getByID(string $id): ?Project;
    public function getAll():Collection;
}
