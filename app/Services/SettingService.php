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
    public function __construct(protected SettingInterface $repo, protected FileService $fileService){}
    public function changeSettings(SettingDTO $dto): bool
    {
        return $this->handle(function () use ($dto) {
            $setting = Setting::first();
            $project_name = 'settings';

            if ($dto->logo && $dto->background_image) {

                if ($setting->files) {
                    foreach ($setting->files as $file) {
                        $this->fileService->deleteFile($file->file_path);
                        $file->delete();
                    }
                }
                $fileDataArray = $this->fileService->uploadMultipleFiles([$dto->logo, $dto->background_image], $project_name);
                foreach ($fileDataArray as $fileData) {
                    $setting->files()->create($fileData);
                }
            }
            $setting = $this->repo->changeSettings($dto);
            return $setting;
        });
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
