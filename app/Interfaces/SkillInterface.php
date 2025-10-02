<?php

namespace App\Interfaces;

use App\DTOs\SkillDTO;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

Interface SkillInterface
{
    public function create(SkillDTO $dto): Skill;
    public function update(SkillDTO $dto):?Skill;
    public function delete(String $id): bool;
    public function getById(String $id): ?Skill;
    public function getAll():Collection;
}
