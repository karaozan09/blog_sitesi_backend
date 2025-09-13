<?php

namespace App\Services;

use App\DTOs\Social_MediaDTO;
use App\Interfaces\SocialMediaInterface;
use App\Models\Social_Media;
use Illuminate\Database\Eloquent\Collection;

class SocialMediaService extends BaseService
{
    public function __construct(protected SocialMediaInterface $repo){}

    public function create(Social_MediaDTO $dto):Social_Media
    {
        return $this->handle(fn()=>$this->repo->create($dto));
    }
    public function update(Social_MediaDTO $dto):?Social_Media
    {
        return $this->handle(fn()=>$this->repo->update($dto));
    }
    public function delete(String $id):bool
    {
        return $this->handle(fn()=>$this->repo->delete($id));
    }
    public function  getById(String $id):?Social_Media
    {
        return $this->repo->getById($id);
    }
    public function getAll():Collection
    {
        return $this->repo->getAll();
    }
}
