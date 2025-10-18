<?php

namespace App\Repositories;

use App\DTOs\SkillDTO;
use App\Interfaces\SkillInterface;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

class SkillRepository implements SkillInterface
{
    public function create(SkillDTO $dto):  Skill
    {
        return Skill::create($dto->toArray());
    }
    public function update(SkillDTO $dto):?Skill
    {
        $skill = Skill::find($dto->id);
        if(!$skill) return null;

        $skill->update($dto->toArray());
        return $skill;
    }
    public function delete(string $id): bool
    {
        $skill = Skill::find($id);
        return $skill->delete() ?? false;
    }
    public function getById(String $id): ?Skill
    {
        return Skill::find($id);
    }
    public function getAll():Collection
    {
        return Skill::all();
    }
}
