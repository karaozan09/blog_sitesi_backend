<?php

namespace App\Interfaces;

use App\DTOs\AboutDTO;
use App\Models\About;
use Illuminate\Database\Eloquent\Collection;

interface AboutInterface
{
    public function create(AboutDTO $dto): About;
    public function update(AboutDTO $dto): ?About;
    public function delete(string $id): bool;
    public function getAll():Collection ;
}
