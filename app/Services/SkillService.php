<?php

namespace App\Services;

use App\DTOs\SkillDTO;
use App\Interfaces\SkillInterface;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;

class SkillService extends BaseService
{
    public function __construct(protected SkillInterface $repo, protected FileService $fileService){}
    public function create(SkillDTO $dto):Skill
    {
        return $this->handle(function () use ($dto) {
            $folder_name = 'skills';

            $fileData = $this->fileService->uploadSingleFile($dto->skill_image, $folder_name);
            $skill = $this->repo->create($dto);
            if($skill){
                $skill->file()->create($fileData);
            }
            return $skill;
        })  ;
    }
    public function update(SkillDTO $dto):?Skill
    {
        return $this->handle(function () use ($dto){
            $skill = Skill::find($dto->id);

            if($dto->skill_image){
                $folder_name = 'skills';

                if($skill->file){
                    $this->fileService->deleteFile($skill->file->file_path);
                    $skill->file()->delete();
                }
                $fileData = $this->fileService->uploadSingleFile($dto->skill_image, $folder_name);
                $skill->file()->create($fileData);
            }
            $skill = $this->repo->update($dto);
            return $skill;
        });
    }
    public function delete(String $id): ?bool
    {
        return $this->handle(function () use ($id){
            $skill = Skill::find($id);
            if($skill->file){
                $this->fileService->deleteFile($skill->file->file_path);
                $skill->file()->delete();
            }
            return $this->repo->delete($id);
        });
    }
    public function getById(String $id): ?Skill
    {
        return $this->handle(fn() => $this->repo->getById($id));
    }
    public function getAll():Collection
    {
        return $this->repo->getAll();
    }

}
