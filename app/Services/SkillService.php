<?php

namespace App\Services;

use App\DTOs\SkillDTO;
use App\Interfaces\SkillInterface;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

class SkillService extends BaseService
{
    public function __construct(protected SkillInterface $repo){}
    public function create(SkillDTO $dto):Skill
    {
        return $this->handle(fn() => $this->repo->create($dto))  ;
    }
    public function update(SkillDTO $dto):?Skill
    {
        return $this->handle(fn() => $this->repo->update($dto));
    }
    public function delete(String $id): ?bool
    {
        return $this->handle(fn() => $this->repo->delete($id));
    }
    public function getById(String $id): ?Skill
    {
        return $this->handle(fn() => $this->repo->getById($id));
    }
    public function getAll():Collection
    {
        return $this->repo->getAll();
    }

}
