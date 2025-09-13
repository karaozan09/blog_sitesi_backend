<?php

namespace App\Repositories;

use App\DTOs\SettingDTO;
use App\Interfaces\SettingInterface;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingRepository implements SettingInterface
{
    public function create(SettingDTO $dto): Setting
    {
        return Setting::create($dto->toArray());
    }
    public function update(SettingDTO $dto): ?Setting
    {
        $setting = Setting::find($dto->id);
        if(!$setting) return null;

        $setting->update($dto->toArray());
        return $setting;
    }
    public function delete(string $id): bool
    {
        $setting = Setting::find($id);
        return $setting->delete() ?? false;
    }
    public function getAll():Collection
    {
        return Setting::all();
    }
}
