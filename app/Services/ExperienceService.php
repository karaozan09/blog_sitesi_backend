<?php

namespace App\Services;

use App\DTOs\ExperienceDTO;
use App\Interfaces\ExperienceInterface;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;

class ExperienceService extends BaseService
{
    public function __construct(protected ExperienceInterface $repo, protected FileService $fileService){}
    public function create(ExperienceDTO $dto): Experience
    {
        return $this->handle(function () use ($dto) {
            $folder_name = 'experiences';

            $fileData = $this->fileService->uploadSingleFile($dto->experience_image, $folder_name);
            $experience = $this->repo->create($dto);
            if($experience){
                $experience->file()->create($fileData);
            }
            return $experience;
        });
    }
    public function update(ExperienceDTO $dto): ?Experience
    {
        return $this->handle(function () use ($dto) {
            $experience = Experience::find($dto->id);

            if($dto->experience_image){
                $folder_name = 'experiences';

                if($experience->file){
                    $this->fileService->deleteFile($experience->file->file_path);
                    $experience->file()->delete();
                }
                $fileData = $this->fileService->uploadSingleFile($dto->experience_image, $folder_name);
                $experience->file()->create($fileData);
            }
            $experience = $this->repo->update($dto);
            return $experience;
        });
    }
    public function delete(String $id):?bool
    {
        return $this->handle(function () use($id){
            $experience = Experience::find($id);
            if($experience->file){
                $this->fileService->deleteFile($experience->file->file_path);
                $experience->file()->delete();
            }
            return $this->repo->delete($id);
        });
    }
    public function getById(String $id): ?Experience
    {
        return $this->handle(fn() => $this->repo->getById($id));
    }
    public function getAll():Collection
    {
        return $this->repo->getAll();
    }
}
