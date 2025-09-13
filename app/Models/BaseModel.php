<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    //otomatik ardan ID kullanmayacağımız için:

    public $incrementing = false;

    // ID tipimiz string olduğu için:
    protected $keyType = 'string';

    protected static function boot(){
        parent::boot();
        //Model oluşturulurken tetiklenir
        static::creating(function ($model) {
           //ID henüz yoksa otomatik UUID ata
            if(!$model->getKey()){
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
