<?php

namespace App\Http\Controllers\Blog;

use App\Models\Config\Config;
use App\Http\Requests;
use App\Models\Media\Media;
use App\Models\Blog\Blog;
use App\Models\Category\Category;
use App\Models\Position\Position;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view logged in user profile
        $pageName = trans('blog.blog');
        $user = Auth::user();
        $categories = Category::lists('category','id');
        $positions = Position::lists('position','id');
        
        return view('blog.home', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blog $blog, BlogRequest $request)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Subscriber can not create blog.');
            return \Redirect::back();
        } else {
            

            $all = $request->all();
            $all['status'] = 0;
            $blog = $blog->create($all);

            if($request->has('position_id')){
                $position_id = $request->position_id;
                if($position_id == 1){
                    $slider_list = Config::where('key', 'slider_list')->first();

                    if($slider_list){
                        $slider_list_val = json_decode($slider_list->value);

                        if(count($slider_list_val) == 5){
                            $slider_list_val = array_reverse($slider_list_val);
                            array_shift($slider_list_val);
                        }
                        $slider_list_val[] = $blog->id;

                        $slider_list->update(['value' => json_encode(array_reverse($slider_list_val))]);
                    } else {
                        $data['key'] = 'slider_list';
                        $data['value'] = json_encode([$blog->id]);
                        Config::create($data);
                    }
                } else if($position_id == 2) {
                    $feature_list = Config::where('key', 'feature_list')->first();

                    if($feature_list){
                        $feature_list_val = json_decode($feature_list->value);

                        if(count($feature_list_val) == 4){
                            $feature_list_val = array_reverse($feature_list_val);
                            array_shift($feature_list_val);

                        }
                        $feature_list_val[] = $blog->id;

                        $feature_list->update(['value' => json_encode(array_reverse($feature_list_val))]);
                    } else {
                        $data['key'] = 'feature_list';
                        $data['value'] = json_encode([$blog->id]);
                        Config::create($data);
                    }
                } else if($position_id == 3) {
                    $main_feature = Config::where('key', 'main_feature')->first();
                    if($main_feature){
                        $main_feature->update(['value' => $blog->id]);
                    } else {
                        $data['key'] = 'main_feature';
                        $data['value'] = $blog->id;
                        Config::create($data);
                    }
                } else if($position_id == 4) {
                    $about_img = Config::where('key', 'about_img')->first();
                    if($about_img){
                        $about_img->update(['value' => $blog->id]);
                    } else {
                        $data['key'] = 'about_img';
                        $data['value'] = $blog->id;
                        Config::create($data);
                    }
                }
            }

            Session::flash('success_msg', 'Successfully Uploaded Your Blog !');
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
        $pageName = trans('common.edit').' '.trans('blog.blog');
        
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Subscriber can not Edit blog.');
            return \Redirect::back();
        } else {
            // View Movie News in Edit Page
            $pageName = trans('common.edit') . ' ' . trans('blog.blog');
            $categories = Category::lists('category', 'id');
            $user = Auth::user();
            $positions = Position::lists('position', 'id');
            $blogs = Blog::all();
            return view('blog.home', get_defined_vars());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Blog $blog, BlogRequest $request)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Subscriber can not update blog.');
            return \Redirect::back();
        } else {           

            $all = $request->all();
            $all['status'] = 0;

            if ( !empty($blog->position_id) && empty($request->position_id) ) {
               $slider_list = json_decode(configValue('slider_list'));
               $feature_list = json_decode(configValue('feature_list'));
                $main_feature = configValue('main_feature');
                $about_img = configValue('about_img');

                if ($about_img==$blog->id) {
                   $about_img_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 4)->orderBy('created_at', 'desc')->first();
                    if(count($about_img_blog)>0){
                        Config::where('key', 'about_img')->first()->update(['value' => $about_img_blog->id]);
                    } else {
                        Config::where('key', 'about_img')->first()->update(['value' => '']);
                    }
                }elseif ($main_feature==$blog->id){
                    if(configValue('main_feature') == $blog->id){
                        $main_feature_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 3)->orderBy('created_at', 'desc')->first();
                        if($main_feature_blog){
                            Config::where('key', 'main_feature')->first()->update(['value' => $main_feature_blog->id]);
                        } else {
                            Config::where('key', 'main_feature')->first()->update(['value' => '']);
                        }
                    }
                }elseif( $blog->position_id==2 && count($feature_list) > 0 && in_array($blog->id, $feature_list)) {
                        $list_index = array_search($blog->id, $feature_list);
                        unset($feature_list[$list_index]);
                        $feature_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 2)->orderBy('created_at', 'desc')->first();
                        if(count($feature_list_blog)>0) {
                            if(! in_array($feature_list_blog->id, $feature_list)){
                                $feature_list[$list_index] = $feature_list_blog->id;
                            }
                        }
                        $feature_list = array_values($feature_list);
                        Config::where('key', 'feature_list')->first()->update(['value' => json_encode($feature_list)]);
                }elseif( $blog->position_id==1 && count($slider_list) > 0 && in_array($blog->id, $slider_list)) {
                        $list_index = array_search($blog->id, $slider_list);
                        unset($slider_list[$list_index]);
                        $slider_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 1)->orderBy('created_at', 'desc')->first();
                        if(count($slider_list_blog)>0) {
                            if(! in_array($slider_list_blog->id, $slider_list)){
                                $slider_list[$list_index] = $slider_list_blog->id;
                            }
                        }
                        $slider_list = array_values($slider_list);
                        Config::where('key', 'slider_list')->first()->update(['value' => json_encode($slider_list)]);
                }
            }


            if($request->has('position_id')){
                // When You update About/Main Feature or Feature to Slider Position
                // it will automatically Update to Slider position and update where from it's updated
                $feature_list = json_decode(configValue('feature_list'));
                $main_feature = configValue('main_feature');
                $about_img = configValue('about_img');

                if ($about_img==$blog->id){
                    $about_img_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 4)->orderBy('created_at', 'desc')->first();
                    if($about_img_blog){
                        Config::where('key', 'about_img')->first()->update(['value' => $about_img_blog->id]);
                    } else {
                        Config::where('key', 'about_img')->first()->update(['value' => '']);
                    }
                } elseif ($main_feature==$blog->id){
                    if(configValue('main_feature') == $blog->id){
                        $main_feature_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 3)->orderBy('created_at', 'desc')->first();
                        if($main_feature_blog){
                            Config::where('key', 'main_feature')->first()->update(['value' => $main_feature_blog->id]);
                        } else {
                            Config::where('key', 'main_feature')->first()->update(['value' => '']);
                        }
                    }
                }elseif(count($feature_list) > 0 && in_array($blog->id, $feature_list)) {
                        $list_index = array_search($blog->id, $feature_list);
                        unset($feature_list[$list_index]);
                        $feature_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 2)->orderBy('created_at', 'desc')->first();
                        if($feature_list_blog) {
                            if(! in_array($feature_list_blog->id, $feature_list)){
                                $feature_list[$list_index] = $feature_list_blog->id;
                            }
                        }
                        $feature_list = array_values($feature_list);
                        Config::where('key', 'feature_list')->first()->update(['value' => json_encode($feature_list)]);
                    }

                // Update Code Of Slider Position
                $position_id = $request->position_id;

                if($position_id == 1){
                   $slider_list = Config::where('key', 'slider_list')->first();
                    
                    if($slider_list){
                        $slider_list_val = json_decode($slider_list->value);

                        if (!in_array($blog->id, $slider_list_val)){
                            
                        if(count($slider_list_val) == 5){
                            $slider_list_val = array_reverse($slider_list_val);
                            array_shift($slider_list_val);
                        }

                        $slider_list_val[] = $blog->id;
                        $slider_list->update(['value' => json_encode(array_reverse($slider_list_val))]);

                        }
                        
                    } else {
                        $data['key'] = 'slider_list';
                        $data['value'] = json_encode([$blog->id]);
                        Config::create($data);
                    }



                } else if($position_id == 2) {

//                Update Code Of Feature Position
                    $feature_list = Config::where('key', 'feature_list')->first();

                    if($feature_list){
                        $feature_list_val = json_decode($feature_list->value);
                        if (!in_array($blog->id, $feature_list_val)) {
                           if(count($feature_list_val) == 4){
                                $feature_list_val = array_reverse($feature_list_val);
                                array_shift($feature_list_val);
                            }
                            $feature_list_val[] = $blog->id;
                            $feature_list->update(['value' => json_encode(array_reverse($feature_list_val))]);
                        }                       
                    } else {
                        $data['key'] = 'feature_list';
                        $data['value'] = json_encode([$blog->id]);
                        Config::create($data);
                    }

//                When You update About/Main Feature or Slider to Feature Position
//                it will automatically Update to Feature position and update where from it's updated

                    $slider_list = json_decode(configValue('slider_list'));
                    $main_feature = configValue('main_feature');
                    $about_img = configValue('about_img');

                    if ($about_img==$blog->id){
                        $about_img_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 4)->orderBy('created_at', 'desc')->first();
                        if($about_img_blog){
                            Config::where('key', 'about_img')->first()->update(['value' => $about_img_blog->id]);
                        } else {
                            Config::where('key', 'about_img')->first()->update(['value' => '']);
                        }
                    } elseif ($main_feature==$blog->id){
                        if(configValue('main_feature') == $blog->id){
                            $main_feature_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 3)->orderBy('created_at', 'desc')->first();
                            if($main_feature_blog){
                                Config::where('key', 'main_feature')->first()->update(['value' => $main_feature_blog->id]);
                            } else {
                                Config::where('key', 'main_feature')->first()->update(['value' => '']);
                            }
                        }
                    }elseif(count($slider_list) > 0 && in_array($blog->id, $slider_list)) {
                        $list_index = array_search($blog->id, $slider_list);
                        unset($slider_list[$list_index]);
                        $slider_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 1)->orderBy('created_at', 'desc')->first();
                        if($slider_list_blog) {
                            if (! in_array($slider_list_blog->id, $slider_list)){
                                $slider_list[$list_index] = $slider_list_blog->id;
                            }
                        }
                        $slider_list = array_values($slider_list);
                        Config::where('key', 'slider_list')->first()->update(['value' => json_encode($slider_list)]);
                    }




                } else if($position_id == 3) {

//                Update Code Of Main Feature Position
                    $main_feature = Config::where('key', 'main_feature')->first();
                    if($main_feature){
                        $main_feature->update(['value' => $blog->id]);
                    } else {
                        $data['key'] = 'main_feature';
                        $data['value'] = $blog->id;
                        Config::create($data);
                    }

 //                When You update About/Feature or Slider to Main Feature Position
//                it will automatically Update to Main Feature position and update where from it's updated

                    $slider_list = json_decode(configValue('slider_list'));
                    $feature_list = json_decode(configValue('feature_list'));
                    $about_img = configValue('about_img');

                    if ($about_img==$blog->id){
                        $about_img_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 4)->orderBy('created_at', 'desc')->first();
                        if($about_img_blog){
                            Config::where('key', 'about_img')->first()->update(['value' => $about_img_blog->id]);
                        } else {
                            Config::where('key', 'about_img')->first()->update(['value' => '']);
                        }
                    }elseif(count($slider_list) > 0 && in_array($blog->id, $slider_list)) {
                        $list_index = array_search($blog->id, $slider_list);
                        unset($slider_list[$list_index]);
                        $slider_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 1)->orderBy('created_at', 'desc')->first();
                        if($slider_list_blog) {
                            if (! in_array($slider_list_blog->id, $slider_list)){
                                $slider_list[$list_index] = $slider_list_blog->id;
                            }
                        }
                        $slider_list = array_values($slider_list);
                        Config::where('key', 'slider_list')->first()->update(['value' => json_encode($slider_list)]);
                    }elseif(count($feature_list) > 0 && in_array($blog->id, $feature_list)) {
                        $list_index = array_search($blog->id, $feature_list);
                        unset($feature_list[$list_index]);
                        $feature_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 2)->orderBy('created_at', 'desc')->first();
                        if($feature_list_blog) {
                            if(! in_array($feature_list_blog->id, $feature_list)){
                                $feature_list[$list_index] = $feature_list_blog->id;
                            }
                        }
                        $feature_list = array_values($feature_list);
                        Config::where('key', 'feature_list')->first()->update(['value' => json_encode($feature_list)]);
                    }


                } else if($position_id == 4) {

//                Update Code Of About Position
                    $about_img = Config::where('key', 'about_img')->first();
                    if($about_img){
                        $about_img->update(['value' => $blog->id]);
                    } else {
                        $data['key'] = 'about_img';
                        $data['value'] = $blog->id;
                        Config::create($data);
                    }


//                When You update Slider/Feature or Main Feature to About Position
//                it will automatically Update to About position and update where from it's updated

                    $slider_list = json_decode(configValue('slider_list'));
                    $feature_list = json_decode(configValue('feature_list'));
                    $main_feature = configValue('main_feature');

                    if ($main_feature==$blog->id){
                        if(configValue('main_feature') == $blog->id){
                            $main_feature_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 3)->orderBy('created_at', 'desc')->first();
                            if($main_feature_blog){
                                Config::where('key', 'main_feature')->first()->update(['value' => $main_feature_blog->id]);
                            } else {
                                Config::where('key', 'main_feature')->first()->update(['value' => '']);
                            }
                        }
                    }elseif(count($slider_list) > 0 && in_array($blog->id, $slider_list)) {
                        $list_index = array_search($blog->id, $slider_list);
                        unset($slider_list[$list_index]);
                        $slider_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 1)->orderBy('created_at', 'desc')->first();
                        if($slider_list_blog) {
                            if (! in_array($slider_list_blog->id, $slider_list)){
                                $slider_list[$list_index] = $slider_list_blog->id;
                            }
                        }
                        $slider_list = array_values($slider_list);
                        Config::where('key', 'slider_list')->first()->update(['value' => json_encode($slider_list)]);
                    }elseif(count($feature_list) > 0 && in_array($blog->id, $feature_list)) {
                        $list_index = array_search($blog->id, $feature_list);
                        unset($feature_list[$list_index]);
                        $feature_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 2)->orderBy('created_at', 'desc')->first();
                        if($feature_list_blog) {
                            if(! in_array($feature_list_blog->id, $feature_list)){
                                $feature_list[$list_index] = $feature_list_blog->id;
                            }
                        }
                        $feature_list = array_values($feature_list);
                        Config::where('key', 'feature_list')->first()->update(['value' => json_encode($feature_list)]);
                    }

                }
            }
            // Update Blog with position
            $blog->update($all);

            Session::flash('success_msg', 'Successfully Updated the Blog !');
            return redirect('allblog');
        }
    }  

     /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (Auth::user()->role_id == 4 ) {
            Session::flash('error_msg', 'Subscriber can not Delete blog.');
            return \Redirect::back();
        } else {

            if($blog->position_id == 4){

                if(configValue('about_img') == $blog->id){
                    $about_img_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 4)->orderBy('created_at', 'desc')->first();
                    if($about_img_blog){
                        Config::where('key', 'about_img')->first()->update(['value' => $about_img_blog->id]);
                    } else {
                        Config::where('key', 'about_img')->first()->update(['value' => '']);
                    }
                }
            } else if($blog->position_id == 3) {
                if(configValue('main_feature') == $blog->id){
                    $main_feature_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 3)->orderBy('created_at', 'desc')->first();
                    if($main_feature_blog){
                        Config::where('key', 'main_feature')->first()->update(['value' => $main_feature_blog->id]);
                    } else {
                        Config::where('key', 'main_feature')->first()->update(['value' => '']);
                    }
                }
            } else if($blog->position_id == 2) {
                $feature_list = configValue('feature_list');
                if($feature_list){
                    $feature_list = json_decode($feature_list);
                    if(count($feature_list) > 0 && in_array($blog->id, $feature_list)) {
                        $list_index = array_search($blog->id, $feature_list);
                        unset($feature_list[$list_index]);
                        $feature_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 2)->orderBy('created_at', 'desc')->first();
                        if($feature_list_blog) {
                            if(! in_array($feature_list_blog->id, $feature_list)){
                                $feature_list[$list_index] = $feature_list_blog->id;
                            }
                        }
                        $feature_list = array_values($feature_list);
                        Config::where('key', 'feature_list')->first()->update(['value' => json_encode($feature_list)]);
                    }
                }
            } else if($blog->position_id == 1) {

                $slider_list = configValue('slider_list');

                if($slider_list){
                    $slider_list = json_decode($slider_list);

                    if(count($slider_list) > 0 && in_array($blog->id, $slider_list)) {
                        $list_index = array_search($blog->id, $slider_list);
                        unset($slider_list[$list_index]);

                        $slider_list_blog = Blog::where('id', '!=', $blog->id)->where('position_id', 1)->orderBy('created_at', 'desc')->first();
                        
                        if($slider_list_blog) {
                            if (! in_array($slider_list_blog->id, $slider_list)){
                                $slider_list[$list_index] = $slider_list_blog->id;
                            }
                        }

                        $slider_list = array_values($slider_list);
                        Config::where('key', 'slider_list')->first()->update(['value' => json_encode($slider_list)]);
                    }
                }
            }

            $blog->delete();

            Session::flash('success_msg', 'Successfully Deleted the Blog !');
            return redirect('allblog');
        }
    }




}
