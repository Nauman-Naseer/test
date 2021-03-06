<?php

namespace App\Http\Controllers\Media;

use Illuminate\Http\Request;
use App\Models\Media\Media;
use App\Models\Blog\Blog;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MediaController extends Controller
{
    public function index()
    {
        //loaded media index page
        $pageName = trans('common.media');

        $medias = Media::orderBy('created_at', 'desc')->get();
        $title = trans('common.create') . ' ' . trans('common.media');

        return view('media.home', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Media $model)
    {

         $this->validate($request, [
            'media' => 'required|image',
        ]);



        $media = '';
        if ($request->file('media')) {
            $ext = $request->file('media')->getClientOriginalExtension();
            $media = microtime(true) . '.' . $ext;
            $destinationPath = 'poster';
            $request->file('media')->move($destinationPath, $media);
        }

        $all = $request->all();
        $all['path'] = $media;
        $model = $model->create($all);

        if($request->ajax()){
            return response()->json(['success' => true, 'media_info' => $model]);
        }

        return redirect('media');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        $medias = Media::get();
        $title = trans('common.edit') . ' ' . trans('common.media');
        return view('media.home', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Media $media, Request $request)
    {
       

        $image = $media->path;
        if ($request->file('media')) {
            $extPoster = $request->file('media')->getClientOriginalExtension();
            $image = microtime(true) . '.' . $extPoster;
            $destinationPath = 'poster/';
            $request->file('media')->move($destinationPath, $image);
        }

        $all = $request->all();
        $all['path'] = $image;
        $all['status'] = 0;
        $media->update($all);

        Session::flash('success_msg', 'Successfully Updated');
        return redirect('media');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        $media->delete();
        Session::flash('success_msg', 'Successfully Deleted.');
        return redirect('media');
    }

    public function loadMedia()
    {
        $allMedia = Media::orderBy('created_at', 'desc')->get();
        return response()->json($allMedia);
    }

    
}
