<?php

namespace App\Http\Controllers\Subscribe;

use App\Http\Requests;
use App\Models\Subscribe\Subscribe;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscribe\SubsRequest;
use Illuminate\Support\Facades\Session;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view logged in user profile
        $pageName = trans('blog.subscriber');
        $subscibers = Subscribe::all();
        return view('subscribe.home', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subscribe $subscribe, SubsRequest $request)
    {

        $all=$request->all();
        $subscribe->create($all);

        Session::flash('success_msg', 'Successfully Created a Subscriber !');
        return \Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
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
    public function edit(Subscribe $subscribe)
    {
        // View Movie News in Edit Page
        $pageName = trans('common.edit').' '.trans('blog.subscriber');
        $subscibers = Subscribe::all();
        $subscriber = Subscribe::all();
        return view( 'subscribe.home', get_defined_vars() );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Subscribe $subscribe, SubsRequest $request)
    {       
        
        $all = $request->all();
        $subscribe->update($all);

        Session::flash('success_msg', 'Successfully Updated the Subscriber !');
        return redirect('subscribe');
    }  

     /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {
        // Delete single Movie News with  ID.
        $subscribe->delete();

        Session::flash('success_msg', 'Successfully Deleted the Subscriber !');
        return redirect('subscribe');
    }




}
