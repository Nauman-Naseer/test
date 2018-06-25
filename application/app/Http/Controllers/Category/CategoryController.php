<?php

namespace App\Http\Controllers\Category;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view logged in user profile
        $pageName = trans('blog.category');
        return view('category.home', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category $category, CategoryRequest $request)
    {
        if (Auth::user()->role_id != 1 ) {
            Session::flash('error_msg', 'Subscriber can not create Category.');
            return \Redirect::back();
        } else {

            $all = $request->all();
            $category->create($all);

            Session::flash('success_msg', 'Successfully Created a Category !');
            return \Redirect::back();
        }
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
        $pageName = trans('common.edit').' '.trans('blog.blog');
        
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (Auth::user()->role_id != 1 ) {
            Session::flash('error_msg', 'Only Admin can Edit Category.');
            return \Redirect::back();
        } else {
            // View Movie News in Edit Page
            $pageName = trans('common.edit') . ' ' . trans('blog.category');
            $categories = Category::all();
            return view('category.home', get_defined_vars());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category, CategoryRequest $request)
    {
        
        if (Auth::user()->role_id != 1 ) {
            Session::flash('error_msg', 'Only Admin can Update Category.');
            return \Redirect::back();
        } else {

            $all = $request->all();
            $category->update($all);

            Session::flash('success_msg', 'Successfully Updated the Category !');
            return redirect('allcategory');
        }
    }  

     /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Only Admin can Delete Category.');
            return \Redirect::back();
        } else {
            // Delete single Movie News with  ID.
            $category->delete();

            Session::flash('success_msg', 'Successfully Deleted the Category !');
            return redirect('allcategory');
        }
    }




}
