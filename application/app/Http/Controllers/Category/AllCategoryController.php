<?php

namespace App\Http\Controllers\Category;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AllCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view logged in user profile
        $pageName = trans('common.all').trans('blog.category');
        $categories = Category::all();
        return view('category.category', get_defined_vars());
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // show user profile
        
    }

}
