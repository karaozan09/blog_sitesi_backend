<?php

namespace App\Providers;

use App\Interfaces\AboutInterface;
use App\Interfaces\ArticleInterface;
use App\Interfaces\ProjectInterface;
use App\Interfaces\SettingInterface;
use App\Interfaces\SocialMediaInterface;
use App\Repositories\AboutRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SocialMediaRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AboutInterface::class, AboutRepository::class);
        $this->app->bind(ArticleInterface::class, ArticleRepository::class);
        $this->app->bind(ProjectInterface::class, ProjectRepository::class);
        $this->app->bind(SocialMediaInterface::class, SocialMediaRepository::class);
        $this->app->bind(SocialMediaInterface::class, SocialMediaRepository::class);
        $this->app->bind(SettingInterface::class, SettingRepository::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
