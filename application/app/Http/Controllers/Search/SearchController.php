<?php

namespace App\Http\Controllers\Search;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Blog\Blog;
use App\Models\Page\Page;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Search Page Information with Searched by visitor query
        $searches = Blog::orderby('created_at', 'desc')->paginate(8);
        $recent_blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
        $blogs = Blog::all();
        // Get pages
        $pages = Page::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        $blog4 = Blog::where('position_id', '4')->orderBy('created_at', 'desc')->first();

        return view('search.search', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->search;
        if ($request->isMethod('POST')) {
            $res = $request->search;
            $searches = Blog::where('title', 'LIKE', '%' . $res . '%')->paginate(4);

            $blogs = Blog::all();
            $latest = Blog::orderBy('created_at', 'desc')->paginate(5);
            $recent_blogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
            $categories = Category::all();
            $pages = Page::orderBy('created_at', 'desc')->get();
            if (count($searches) != 0) {

                return view('search.search', get_defined_vars());
            } else {
                return view('search.search', get_defined_vars());
            }
        }

        Session::flash('success_msg', 'Successfully Submitted your Message !');
        return view('search');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }


}
