<?php

namespace App\Repositories;

use App\DTOs\Social_MediaDTO;
use App\Interfaces\SocialMediaInterface;
use App\Models\Social_Media;
use Illuminate\Database\Eloquent\Collection;

class SocialMediaRepository implements SocialMediaInterface
{
    public function create(Social_MediaDTO $dto):Social_Media
    {
        return Social_Media::create($dto->toArray());
    }
    public function update(Social_MediaDTO $dto): ?Social_Media
    {
        $social_media = Social_Media::find($dto->id);
        if(!$social_media) return null;

        $social_media->update($dto->toArray());
        return $social_media;
    }
    public function delete(string $id):bool
    {
        $social_media = Social_Media::find($id);
        return  $social_media->delete() ?? false;
    }
    public function getByID(string $id): ?Social_Media
    {
        return Social_Media::find($id);
    }
    public function getAll(): Collection
    {
        return Social_Media::all();
    }

}
