<?php

namespace App\Interfaces;

use App\DTOs\ContactDTO;
use App\DTOs\FooterDTO;
use App\DTOs\SettingDTO;
use Illuminate\Database\Eloquent\Collection;

interface SettingInterface
{
    public function changeSettings(SettingDTO $dto): ?bool;
    public function delete(SettingDTO $dto): bool;
    public function getAll():Collection;
    public function changeFooter(FooterDTO $dto): ?bool;
    public function changeContact(ContactDTO $dto): ?bool;
}
