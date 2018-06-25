<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Models\Blog\Blog;
use App\Models\Page\Page;
use App\Models\Basic\Basic;
use App\Models\Category\Category;
use DB;
use Storage;
use Log;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
            // Get All contents 
            $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
            $pages = Page::orderBy('created_at', 'desc')->get();
            $categories = Category::all();
            $recent_blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();

            return view('blog.index', get_defined_vars());
    }

    //delete data in demo version
    public function delete_data_hourly()
    {
        if (env('APP_ENV') == 'demo') {

            // migrate all table
            Artisan::call('migrate:refresh', [
                '--force' => true,
            ]);

            //seed all table
            Artisan::call('db:seed', [
                '--force' => true,
            ]);
            Log::info('Demo data deleted at', [date('d-m-Y h:i:s:A')]);
        }
    }

}
 