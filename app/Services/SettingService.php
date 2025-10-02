<?php

namespace App\Services;

use App\DTOs\ContactDTO;
use App\DTOs\FooterDTO;
use App\DTOs\SettingDTO;
use App\Interfaces\SettingInterface;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingService extends BaseService
{
    public function __construct(protected SettingInterface $repo){}
    public function changeSettings(SettingDTO $dto):bool
    {
        return $this->handle(fn() => $this->repo->changeSettings($dto));
    }
    public function delete(SettingDTO $dto): bool
    {
        return $this->handle(fn() => $this->repo->delete($dto));
    }
    public function getAll(): Collection
    {
        return $this->repo->getAll();
    }
    public function changeFooter(FooterDTO $dto):bool
    {
        return $this->handle(fn() => $this->repo->changeFooter($dto));
    }
    public function changeContact(ContactDTO $dto):bool
    {
        return $this->handle(fn()=> $this ->repo->changeContact($dto));
    }
}
