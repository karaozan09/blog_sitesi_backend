<?php

namespace App\Services;

use App\DTOs\SettingDTO;
use App\Interfaces\SettingInterface;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingService extends BaseService
{
    public function __construct(protected SettingInterface $repo){}

    public function create(SettingDTO $dto):Setting
    {
        return $this->handle(fn() => $this->repo->create($dto));
    }
    public function update(SettingDTO $dto): ?Setting
    {
        return $this->handle(fn() => $this->repo->update($dto));
    }
    public function delete(string $id): bool
    {
        return $this->handle(fn() => $this->repo->delete($id));
    }
    public function getAll(): Collection
    {
        return $this->repo->getAll();
    }
}
