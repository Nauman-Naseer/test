<?php
namespace App\Http\Controllers\Blogs;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Blog\Blog;
use App\Models\Page\Page;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view Home page if you have not any id
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        $recent_blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::all();

        return view('blog.index', get_defined_vars());
    }

    /**
     * Display a Blog of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function blog($id)
    {
        $pageName = trans('blog.single') . ' ' . trans('blog.blog');

        $singleBlog = Blog::find($id);
        $user = User::find($singleBlog->user_id);
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $recent_blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::all();
        $pages = Page::orderBy('created_at', 'desc')->get();

        return view('blog.single', get_defined_vars());

    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($categoryName)
    {
        $pageName = trans('blog.category');

        $allCategory = Category::where('category', $categoryName)->get();
        $user_blogs = User::where('name', $categoryName)->get();
        $singlepage = Page::where('title', $categoryName)->first();
        $pages = Page::orderBy('created_at', 'desc')->get();

        if (count($allCategory) > 0) {
            $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
            $recent_blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
            $categories = Category::all();

            return view('blog.category', get_defined_vars());
        } elseif(count($user_blogs) > 0) {
            
            $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
            $recent_blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
            $categories = Category::all();

            return view('blog.user', get_defined_vars());
            
        }elseif(count($singlepage) > 0) {
            
            $pageName = trans('blog.single') . ' ' . trans('blog.page');

            $user = User::find($singlepage->user_id);
            $blogs = Blog::orderBy('created_at', 'desc')->get();
            $recent_blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
            $categories = Category::all();
            


            return view('page.single', get_defined_vars());
            
        }else{
            return redirect('/');
        }

    }


    


}
