<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_description',
        'link',
        'project_programming_languages'
    ];
    protected $casts = ["project_programming_languages" => "array"];
}
