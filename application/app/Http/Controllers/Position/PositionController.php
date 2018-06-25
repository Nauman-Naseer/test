<?php

namespace App\Http\Controllers\Position;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Position\Position;
use App\Http\Controllers\Controller;
use App\Http\Requests\Position\PositionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view logged in user profile
        $pageName = trans('blog.position');
        $positions = Position::all();

        return view('position.home', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Position $position, PositionRequest $request)
    {

        $all=$request->all();
        $position->create($all);

        Session::flash('success_msg', 'Successfully Created a Position !');
        return \Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
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
    public function edit(Position $position)
    {
        // View Movie News in Edit Page
        $pageName = trans('common.edit').' '.trans('blog.position');
        $positions = Position::all();
        return view( 'position.home', get_defined_vars() );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Position $position, PositionRequest $request)
    {       
        
        $all = $request->all();
        $position->update($all);

        Session::flash('success_msg', 'Successfully Updated the Position !');
        return redirect('position');
    }  

     /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        // Delete single Movie News with  ID.
        // return $position;
        $id= $position->id;
        if ( ($id=='1') || ($id=='2') || ($id=='3') || ($id=='4') ) {
            Session::flash('success_msg', 'You can not  Delete the Position !');
            return redirect('position');
        } else{
            $position->delete();
        }

        Session::flash('success_msg', 'Successfully Deleted the Position !');
        return redirect('position');
    }




}
