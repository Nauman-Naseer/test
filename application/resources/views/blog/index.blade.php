@extends('blog.app')

@section('content')

    <article>
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-8">
                    <?php $slider_list = configValue('slider_list'); ?>
                    @if($slider_list)
                        <?php $slider_list = json_decode($slider_list); ?>
                        @if(count($slider_list) > 0)
                            <div class="row">
                                <div class="col-md-12">
                                <div class="slider_area" >
                                    <div id="jssor_1"
                                         style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 620px; visibility: hidden;">
                                        <!-- Loading Screen -->

                                        <div data-u="slides"
                                             style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 670px; ">

                                            @foreach($slider_list as $slider)

                                                <?php $blog = \App\Models\Blog\Blog::find($slider); ?>
                                                <div style="display: none;">
                                                    <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}"> <img
                                                                data-u="image"
                                                                src="@if($blog->image){{ url('poster/'. $blog->image) }}@else {{ url('img/'. 'default.png') }} @endif"
                                                                style="height:100%;"/></a>
                                                </div>

                                            @endforeach


                                        </div>

                                        <!-- Arrow Navigator -->
                                        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;" data-autocenter="2"></span>
                                        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;" data-autocenter="2"></span>

                                    </div>

                                </div>
                            </div>
                            </div>

                            @endif
                            @endif
                                    <!--  end slider -->
                            <?php $feature_list = configValue('feature_list'); ?>
                            @if($feature_list)
                                <?php $feature_list = json_decode($feature_list); ?>
                                @if(count($feature_list) > 0)
                                    <div class="row">
                                        @foreach($feature_list as $feature)
                                            <?php 
                                                $blog = \App\Models\Blog\Blog::find($feature); 
                                                $user_name= \Illuminate\Foundation\Auth\User::find($blog->user_id) ? \Illuminate\Foundation\Auth\User::find($blog->user_id)->name : '';
                                            ?>

                                            <div class="blog1 col-md-6">

                                                @if($blog->video)
                                                    <video width="100%" height="294"  id="player2" poster="" controls="controls" preload="none">
                                                        <source type="video/youtube" src="{!! $blog->video !!}" />
                                                        <style>
                                                            .mejs-overlay-button{
                                                                background: none;
                                                            }
                                                        </style>                                    
                                                    </video>
                                                    @else
                                                <div class="blog_image">
                                                    <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}"><img
                                                                src="@if($blog->image){{ url('poster/'. $blog->image) }}@else {{ url('img/'. 'default.jpg') }} @endif"></a>
                                                </div>
                                                @endif

                                                <div class="about_details">
                                                    <h2>
                                                        <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}">{!! $blog->title !!}</a>
                                                    </h2>
                                                    {!! preg_replace("/(<br\s*\/?>\s*)+|(?:\s\s+|\n|\t|\r)/",'',blog($blog->blog, 50)) !!} ...
                                                    <div class="icon">
                                                        <a href="{{url('blogs/'.$user_name)}}"><i class="fa fa-user"
                                                                       aria-hidden="true">
                                                                {!! $user_name !!}
                                                            </i></a>
                                                        <a href="#"><i class="fa fa-clock-o"
                                                                       aria-hidden="true">  {{ date('j F Y', strtotime($blog->created_at) )}}</i></a>
                                                        <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}#comment"><i class="fa fa-comments-o" aria-hidden="true">
                                                                {{ trans('common.comments') }}</i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach
                                        </div>
                                        @endif
                                        @endif

                                                <!-- start celebrity -->
                                            <div class="row">
                                                <?php $main_feature = configValue('main_feature'); ?>
                                                @if($main_feature)
                                                <?php $blog3 = \App\Models\Blog\Blog::find($main_feature); 
                                                    $blog_name = \Illuminate\Foundation\Auth\User::find($blog3->user_id) ? \Illuminate\Foundation\Auth\User::find($blog3->user_id)->name :'';
                                                ?>
                                                <div class="celebraty col-md-12">
                                                    <div class="">

                                                     @if($blog3->video)
                                                        <video width="100%" height="400"  id="player2" poster="" controls="controls" preload="none">
                                                            <source type="video/youtube" src="{!! $blog3->video !!}" />
                                                            <style>
                                                                .mejs-overlay-button{
                                                                    background: none;
                                                                }
                                                            </style>                                    
                                                        </video>
                                                        @else
                                                        <a href="{{ url('blogs/'. $blog3->id .'/'. str_replace('+','-', urlencode($blog3->title))) }}"><img
                                                                    src="@if($blog3->image){{ url('poster/'. $blog3->image) }}@else {{ url('img/'. 'default.jpg') }} @endif"
                                                                    alt="bloger"></a>
                                                        @endif

                                                    </div>
                                                    <div class="about_details">
                                                        <h2>
                                                            <a href="{{ url('blogs/'. $blog3->id .'/'. str_replace('+','-', urlencode($blog3->title))) }}">{!! $blog3->title !!}</a>
                                                        </h2>
                                                        <p>{!! blog($blog3->blog, 50) !!} ...</p>
                                                        <div class="icon">
                                                            <a href="{{url('blogs/'.$blog_name)}}"><i class="fa fa-user"
                                                                           aria-hidden="true">
                                                                    {!! $blog_name !!}
                                                                </i></a>
                                                            <a href="#"><i class="fa fa-clock-o"
                                                                           aria-hidden="true">  {{ date('j F Y', strtotime($blog3->created_at) )}}</i></a>
                                                            <a href="{{ url('blogs/'. $blog3->id .'/'. str_replace('+','-', urlencode($blog3->title))) }}#comment"><i class="fa fa-comments-o" aria-hidden="true">
                                                                    {{ trans('common.comments') }}</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                                    <!-- start full blog -->
                                            <div class="row">
                                                @foreach($blogs as $blog)
                                                <?php $user_name= \Illuminate\Foundation\Auth\User::find($blog->user_id) ? \Illuminate\Foundation\Auth\User::find($blog->user_id)->name :''; ?>
                                                    <div class="full">
                                                        <div class="full-blog col-md-5">
                                                            @if($blog->video)
                                                                <video width="100%" height="200"  id="player2" poster="" controls="controls" preload="none">
                                                                    <source type="video/youtube" src="{!! $blog->video !!}" />
                                                                    <style>
                                                                        .mejs-overlay-button{
                                                                            background: none;
                                                                        }
                                                                    </style>                                    
                                                                </video>
                                                                @else
                                                            <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}"><img
                                                                        src="@if($blog->image){{ url('poster/'. $blog->image) }}@else {{ url('img/'. 'default.jpg') }} @endif"
                                                                        alt="bloger"></a>
                                                                @endif

                                                        </div>
                                                        <div class="blog-detail col-md-7">
                                                            <h2>
                                                                <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}">{{$blog->title}}</a>
                                                            </h2>
                                                            {!! blog($blog->blog, 100) !!} ...
                                                            <div class="icon">
                                                                <a href="{{url('blogs/'.$user_name)}}"><i class="fa fa-user"
                                                                               aria-hidden="true">
                                                                        {!! $user_name !!}
                                                                    </i></a>
                                                                <a href="#"><i class="fa fa-clock-o"
                                                                               aria-hidden="true"> {{ date('j F Y', strtotime($blog->created_at) )}}</i></a>
                                                                <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}#comment"><i class="fa fa-comments-o" aria-hidden="true">
                                                                        {{ trans('common.comments') }}</i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            {!! $blogs->links() !!}

                </div>


                <!--   start sidebar -->

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 side_ad">

                        {!! basic('sidebar') !!}

                        <div class="about">
                            <h3>{{ trans('common.about') . ' '. trans('common.us') }}</h3>
                        </div>
                        <?php $about_img = configValue('about_img'); ?>
                            @if($about_img)
                                <?php $blog4 = \App\Models\Blog\Blog::find($about_img); ?>
                                <div class="blogar">
                                    <a href="{{ url('blogs/'. $blog4->id .'/'. str_replace('+','-', urlencode($blog4->title))) }}"><img
                                                src="@if($blog4->image){{ url('poster/'. $blog4->image) }}@else {{ url('img/'. 'default.jpg') }} @endif"
                                                alt="bloger"></a>
                                </div>
                                <div class="about_details">
                                    <h2>
                                        <a href="{{ url('blogs/'. $blog4->id .'/'. str_replace('+','-', urlencode($blog4->title))) }}">{!! $blog4->title !!}</a>
                                    </h2>
                                    <p>{!! blog($blog4->blog, 50) !!}</p>
                                </div>
                        @endif
                        </div>
                    </div>


@endsection
