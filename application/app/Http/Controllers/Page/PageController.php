<?php
namespace App\Http\Controllers\Page;

use App\Models\Config\Config;
use App\Http\Requests;
use App\Models\Page\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view logged in user profile
        $title = trans('blog.new') . ' ' . trans('blog.page');
        $user = Auth::user();
        $allpage = Page::orderBy('created_at', 'desc')->get();

        
        return view('page.home', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Page $page, PageRequest $request)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Subscriber can not create blog.');
            return \Redirect::back();
        } else {
            
            $all = $request->all();
            $all['status'] = 0;
            $page->create($all);


            Session::flash('success_msg', 'Successfully Created a Page!');
            return \Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // show user profile
        
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Subscriber can not Edit blog.');
            return \Redirect::back();
        } else {
            // View Movie News in Edit Page
            $title = trans('common.edit') . ' ' . trans('blog.page');
            $user = Auth::user();
            $allpage = Page::orderBy('created_at', 'desc')->get();

            return view('page.home', get_defined_vars());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Page $page, PageRequest $request)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Subscriber can not update blog.');
            return \Redirect::back();
        } else {         
            
            $all = $request->all();
            $all['status'] = 0;
            $page->update($all);        

            Session::flash('success_msg', 'Successfully Updated the Page !');
            return redirect('page');
        }
    }  

     /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $blog)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Subscriber can not Delete blog.');
            return \Redirect::back();
        } else {                    
            $blog->delete();
            Session::flash('success_msg', 'Successfully Deleted the Blog !');
            return redirect('page');
        }
    }




}
