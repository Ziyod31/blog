<?php

namespace App\Providers;

use Carbor\Carbon;
use App\Post;
use App\Tag;
use App\Category;
use App\Comment;
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
        
         view()->composer('dashboard.tags.list', function($view)
        {
        $tags = Tag::all();
        $view->with(compact('tags'));    
        });
        
        view()->composer('blog.inc.nav', function($view)
        {
        $categories = Category::all();
        $view->with('categories', $categories);    
        });
        
        view()->composer('dashboard.categories.list', function($view)
        {
        $categories = Category::all();
        $view->with(compact('categories'));    
        });
        
        view()->composer('dashboard.comments.list', function($view)
        {
        $comments = Comment::all();
        $view->with(compact('comments'));    
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
