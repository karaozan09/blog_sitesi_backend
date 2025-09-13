<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends BaseModel
{
    use HasFactory;
    protected $table = 'about';

    protected $fillable = [
        'full_name',
        'title',
        'about'
    ];
}
