<?php

namespace App\Providers;

use Carbor\Carbon;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('blog.inc.sidebar', function($view)
        {
            $archives = Post::archives();
            $tags = Tag::pluck('name');
            $view->with(compact('archives', 'tags'));
        });
        
        view()->composer('blog.inc.nav', function($view)
        {
        $categories = Category::pluck('name');
        $view->with(compact('categories'));    
        });
        
        view()->composer('dashboard.categories.list', function($view)
        {
        $categories = Category::all();
        $view->with(compact('categories'));    
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
