<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $usersNamespace = 'App\Http\Controllers\Users';
    protected $activityNamespace = 'App\Http\Controllers\Activity';
    protected $blogNamespace = 'App\Http\Controllers\Blog';
    protected $blogsNamespace = 'App\Http\Controllers\Blogs';
    protected $categoryNamespace = 'App\Http\Controllers\Category';
    protected $subscribeNamespace = 'App\Http\Controllers\Subscribe';
    protected $dashboardNamespace = 'App\Http\Controllers\Dashboard';
    protected $searchNamespace = 'App\Http\Controllers\Search';
    protected $basicNamespace = 'App\Http\Controllers\Basic';
    protected $positionNamespace = 'App\Http\Controllers\Position';
    protected $adverNamespace = 'App\Http\Controllers\Advertisement';
    protected $pageNamespace = 'App\Http\Controllers\Page';
    protected $mediaNamespace = 'App\Http\Controllers\Media';
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
        $router->model('users', 'App\User');
        $router->model('blog', 'App\Models\Blog\Blog');
        $router->model('blogs', 'App\Models\Blog\Blog');
        $router->model('category', 'App\Models\Category\Category');
        $router->model('subscribe', 'App\Models\Subscribe\Subscribe');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
          //users
        $router->group(['namespace' => $this->usersNamespace], function ($router) {
            require app_path('Http/Routes/users.php');
        });

        //activities
        $router->group(['namespace' => $this->activityNamespace], function ($router) {
            require app_path('Http/Routes/activities.php');
        });

        //Blog
        $router->group(['namespace' => $this->blogNamespace], function ($router) {
            require app_path('Http/Routes/Blog/blog.php');
        });

        //Public Path Blogs
        $router->group(['namespace' => $this->blogsNamespace], function ($router) {
            require app_path('Http/Routes/Blogs/blogs.php');
        });

        //All Blog
        $router->group(['namespace' => $this->blogNamespace], function ($router) {
            require app_path('Http/Routes/Blog/allblog.php');
        });

        // Category
        $router->group(['namespace' => $this->categoryNamespace], function ($router) {
            require app_path('Http/Routes/Category/category.php');
        });

        // All Category
        $router->group(['namespace' => $this->categoryNamespace], function ($router) {
            require app_path('Http/Routes/Category/allcategory.php');
        });

        // Subscribe
        $router->group(['namespace' => $this->subscribeNamespace], function ($router) {
            require app_path('Http/Routes/Subscribe/subscribe.php');
        });

        // Dashboard
        $router->group(['namespace' => $this->dashboardNamespace], function ($router) {
            require app_path('Http/Routes/Dashboard/dashboard.php');
        });

        // Search
        $router->group(['namespace' => $this->searchNamespace], function ($router) {
            require app_path('Http/Routes/Search/search.php');
        });

        // Basic
        $router->group(['namespace' => $this->basicNamespace], function ($router) {
            require app_path('Http/Routes/Basic/basic.php');
        });

        // Position
        $router->group(['namespace' => $this->positionNamespace], function ($router) {
            require app_path('Http/Routes/Position/position.php');
        });

        // Advertisement
        $router->group(['namespace' => $this->adverNamespace], function ($router) {
            require app_path('Http/Routes/Advertise/advertise.php');
        });

        // Page
        $router->group(['namespace' => $this->pageNamespace], function ($router) {
            require app_path('Http/Routes/Page/page.php');
        });

        // Media
        $router->group(['namespace' => $this->mediaNamespace], function ($router) {
            require app_path('Http/Routes/Media/media.php');
        });



    }
}
