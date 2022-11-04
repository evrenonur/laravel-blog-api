<?php

namespace App\Providers;

use App\Repository\CategoriesRepositoryInterface;
use App\Repository\CommentsRepositoryInterface;
use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\Eloquent\CommentsRepository;
use App\Repository\Eloquent\PostsRepository;
use App\Repository\Eloquent\QuestionsRepository;
use App\Repository\Eloquent\ResponseRepository;
use App\Repository\PostsRepositoryInterface;
use App\Repository\QuestionsRepositoryInterface;
use App\Repository\ReponseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReponseRepositoryInterface::class,ResponseRepository::class);
        $this->app->bind(PostsRepositoryInterface::class,PostsRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class,CategoriesRepository::class);
        $this->app->bind(CommentsRepositoryInterface::class,CommentsRepository::class);
        $this->app->bind(QuestionsRepositoryInterface::class,QuestionsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
