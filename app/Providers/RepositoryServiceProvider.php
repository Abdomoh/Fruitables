<?php

namespace App\Providers;

use function Psy\bin;
use Illuminate\Support\ServiceProvider;
use App\Repository\DBCategoryRepository;
use App\RepositoryInterface\CategoryRepositoryInterFace as RepositoryInterfaceCategoryRepositoryInterFace;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterfaceCategoryRepositoryInterFace::class, DBCategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
