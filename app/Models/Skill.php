<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'skill_name',
    ];
    protected $with = ['file'];
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
