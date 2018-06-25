<?php

namespace App\Http\Controllers\Blog;

use App\Http\Requests;
use App\Models\Blog\Blog;
use App\Http\Controllers\Controller;

class AllBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view logged in user profile
        $pageName = trans('common.all').trans('blog.blog');
        $allblog = Blog::orderBy('created_at', 'desc')->paginate(10);

        return view('blog.allblog', get_defined_vars());
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // show single  profile
        
    }

}
