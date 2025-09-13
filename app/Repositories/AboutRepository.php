<?php

namespace App\Repositories;

use App\DTOs\AboutDTO;
use App\Interfaces\AboutInterface;
use App\Models\About;
use Illuminate\Database\Eloquent\Collection;

class AboutRepository implements AboutInterface
{
    public function create(AboutDTO $dto):About
    {
        return About::create($dto->toArray());
    }
    public function update(AboutDTO $dto): ?About
    {
        $about = About::find($dto->id);
        if(!$about) return null;

        $about->update($dto->toArray());
        return $about;
    }
    public function delete(string $id):bool
    {
        $about = About::find($id);
        return $about->delete() ?? false;
    }
    public function getAll():Collection
    {
        return About::all();
    }
}
