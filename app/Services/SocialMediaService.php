<?php

namespace App\Services;

use App\DTOs\Social_MediaDTO;
use App\Interfaces\SocialMediaInterface;
use App\Models\Social_Media;
use Illuminate\Database\Eloquent\Collection;

class SocialMediaService extends BaseService
{
    public function __construct(protected SocialMediaInterface $repo, protected FileService $fileService){}

    public function create(Social_MediaDTO $dto): Social_Media
    {
        return $this->handle(function () use ($dto) {
            $folder_name = 'social_medias';

            $fileData = $this->fileService->uploadSingleFile($dto->social_media_icon,$folder_name);
            $social_media = $this->repo->create($dto);
            if($social_media){
                $social_media->file()->create($fileData);
            }
            return $social_media;
        });
    }

    public function update(Social_MediaDTO $dto):?Social_Media
    {
        return $this->handle(function () use ($dto) {
            $social_media = Social_Media::find($dto->id);

            if($dto->social_media_icon){
                $folder_name = 'social_medias';

            if($social_media->file){
                $this->fileService->deleteFile($social_media->file->file_path);
                $social_media->file()->delete();
            }
            $fileData = $this->fileService->uploadSingleFile($dto->social_media_icon,$folder_name);
            $social_media->file()->create($fileData);
            }
            $social_media = $this->repo->update($dto);
            return $social_media;
        });
    }
    public function delete(String $id):bool
    {
        return $this->handle(function () use ($id) {
            $social_media = Social_Media::find($id);
            if($social_media->file){
                $this->fileService->deleteFile($social_media->file->file_path);
                $social_media->file()->delete();
            }
            return $this->repo->delete($id);
        });
    }
    public function getById(String $id):?Social_Media
    {
        return $this->repo->getById($id);
    }
    public function getAll():Collection
    {
        return $this->repo->getAll();
    }
}
