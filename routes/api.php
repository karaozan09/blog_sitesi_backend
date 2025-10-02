<?php

//use Illuminate\Http\Request;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Burada API için route tanımları yapılır. Bu rotalar "api" middleware
| grubunda yüklenir. Uygun olan yerde controllerlara yönlendirme yapılabilir.
|
*/

Route::prefix('article')->group(function () {
    Route::post('/create', [ArticleController::class, 'create']);
    Route::put('/update/{id}', [ArticleController::class, 'update']);
    Route::delete('/delete/{id}', [ArticleController::class, 'delete']);
    Route::get('/get/{id}', [ArticleController::class, 'getById']);
    Route::get('/getAll', [ArticleController::class, 'getAll']);
});
Route::prefix('about')->group(function () {
    Route::post('/create', [AboutController::class, 'create']);
    Route::put('/update/{id}', [AboutController::class, 'update']);
    Route::delete('/delete/{id}', [AboutController::class, 'delete']);
    Route::get('/getAll',[AboutController::class, 'getAll']);
});
Route::prefix('project')->group(function (){
    Route::post('/create', [ProjectController::class, 'create']);
    Route::put('/update/{id}', [ProjectController::class, 'update']);
    Route::delete('/delete/{id}', [ProjectController::class, 'delete']);
    Route::get('/get/{id}', [ProjectController::class, 'getById']);
    Route::get('/getAll',[ProjectController::class, 'getAll']);
});
Route::prefix('social-media')->group(function (){
    Route::post('/create', [SocialMediaController::class, 'create']);
    Route::put('/update/{id}', [SocialMediaController::class, 'update']);
    Route::delete('/delete/{id}', [SocialMediaController::class, 'delete']);
    Route::get('get/{id}', [SocialMediaController::class, 'getById']);
    Route::get('/getAll',[SocialMediaController::class, 'getAll']);
});
Route::prefix('setting')->group(function (){
    Route::post('/create', [SettingController::class, 'create']);
    Route::post('changeSettings', [SettingController::class, 'changeSettings']);
    Route::delete('/delete', [SettingController::class, 'delete']);
    Route::get('getAll',[SettingController::class, 'getAll']);
    Route::patch('changeFooter', [SettingController::class, 'changeFooter']);
    Route::patch('changeContact', [SettingController::class, 'changeContact']);
});
Route::prefix('skill')->group(function (){
    Route::post('/create', [SkillController::class, 'create']);
    Route::post('/update/{id}', [SkillController::class, 'update']);
    Route::delete('/delete/{id}', [SkillController::class, 'delete']);
    Route::get('getById/{id}', [SkillController::class, 'getById']);
    Route::get('getAll',[SkillController::class, 'getAll']);
});
Route::prefix('experience')->group(function (){
    Route::post('/create', [ExperienceController::class, 'create']);
    Route::post('/update/{id}', [ExperienceController::class, 'update']);
    Route::delete('/delete/{id}', [ExperienceController::class, 'delete']);
    Route::get('getById/{id}', [ExperienceController::class, 'getById']);
    Route::get('getAll',[ExperienceController::class, 'getAll']);
});

