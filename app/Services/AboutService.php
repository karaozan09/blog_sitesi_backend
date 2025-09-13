<?php

namespace App\Services;

use App\DTOs\AboutDTO;
use App\Interfaces\AboutInterface;
use App\Models\About;
use Illuminate\Database\Eloquent\Collection;

class AboutService extends BaseService
{
    public function __construct(protected AboutInterface $repo){}

    public function create(AboutDTO $dto):About
    {
        return $this->handle(fn() => $this->repo->create($dto));
    }
    public function update(AboutDTO $dto):?About
    {
        return $this->handle(fn()=> $this->repo->update($dto));
    }
    public function delete(string $id): ?bool
    {
        return $this->handle(fn() => $this->repo->delete($id));
    }
    public function getAll(): Collection
    {
        return $this->repo->getAll();
    }
}
