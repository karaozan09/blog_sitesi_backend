<?php

namespace App\Interfaces;

use App\DTOs\SettingDTO;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

interface SettingInterface
{
    public function create(SettingDTO $dto): Setting;

    public function update(SettingDTO $dto): ?Setting;

    public function delete(string $id): bool;

    public function getAll():Collection;
}
