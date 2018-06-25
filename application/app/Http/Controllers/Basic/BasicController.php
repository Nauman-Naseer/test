<?php
namespace App\Http\Controllers\Basic;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Basic\Basic;
use App\Models\Activity\Activity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class BasicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // view Home page if you have not any id
        $basics = Basic::lists('value', 'name');
        if($request->input('platform') == ''){
            $pageName=trans('blog.basic').' '.trans('common.settings') ;
        }else{
        $pageName = ucfirst($request->input('platform')).' '.trans('common.settings') ;
        }
        
        return view('basic.home', get_defined_vars());
        // return redirect()->action('HomeController@index');
    }

    /**
     * Display a Blog of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function blog(Blog $blog, $id)
    {
        // show user profile
        $pageName = trans('blog.single').' '.trans('blog.blog');

        $singleBlog = Blog::find($id);
        $blogs=Blog::all(); 
        $categories=Category::all();

        return view('blog.single', get_defined_vars());
        
    }


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'logo' => 'image',
        ]);

        $basic_data = Basic::get()->pluck('name')->toArray();
 
        $crea_upda = 0;
        foreach ($request->except(['_token']) as $key => $value) {

            if ($request->file($key)) {             
                $extPoster = $request->file($key)->getClientOriginalExtension();
                $value = microtime(true) . '.' . $extPoster;
                $destinationPath = 'img/';
                $request->file($key)->move($destinationPath, $value);
            }

            if(in_array($key, $basic_data)) {
                //updated Basic configuration
                $basics = Basic::where('name', $key)->first();             
                $basics->value = $value;
                $basics->update();

                $crea_upda = 2;
                Session::flash('success_msg', 'Updated Successfully');

            } else {
                //inserted Basic configuration

                $basic = new Basic();
                $basic->name = $key;
                $basic->value = $value;
                $basic->save();
                $crea_upda = 1;

                Session::flash('success_msg', 'Inserted Successfully');
            }

        }

        $user_id = Auth::id();
        $platform = explode('_', $key)[0];

        if($crea_upda == 1){
            $message = "Added $platform Basic info.";
        } else if($crea_upda == 2) {
            $message = "Updated $platform Basic info.";
        } else{
            $message = 'Nothing.';
        }

        //save activity
        Activity::saveActivity($user_id, $message);

        return redirect('basic');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }




}
