<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! basic('site_name') !!} || {!! basic('tag_name') !!}</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font.css') }}">
    <link rel="stylesheet"
          href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
    <link rel="stylesheet" href="{{asset('/css/mediaelementplayer.css')}}" />
    <script type="text/javascript" src="{{ asset('/js/jquery-1.9.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jssor.slider.mini.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/active.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.flexisel.js') }}"></script>


    <script src="{!! asset('js/mediaelement-and-player.min.js') !!}"></script>
    
    <script async="async" src="https://www.google.com/adsense/search/ads.js"></script>

    <!-- other head elements from your page -->

    <script type="text/javascript" charset="utf-8">
      (function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
      arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
    </script>



</head>
<body>
<header>
    
    <div class="container">

        <div class="col-md-12 col-sm-10 col-xs-10 col-lg-12 advertisement">
            {{--Advertisement js Code--}}
            {!! basic('banner') !!}

        </div>
    </div>

        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 logo">
                <a href="{{ url('/') }}"><img src="{{ url('/img/'. basic('logo') ) }}" class="img-responsive"></a>
            </div>

            <div class="col-md-5 col-sm-5" id="sview">
                <div class="name">
                    <h3>{!! basic('site_name') !!}</h3>
                    <h6>{!! basic('tag_name') !!}</h6>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-9">
                {!! Form::open(['url' => "/search",'id'=>'','class'=>'', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes']) !!}
                <div class="input-group">
                    {!! Form::text('search',null, ['id' => 'search','autocomplete'=>'off', 'class' =>'form-control ', 'maxlength' => '200', 'placeholder'=> trans('common.search')  ]) !!}
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" style="margin:0"> {{ trans('common.go') }} </button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>



        </div>
    </div>


</header>


    <nav class="navbar navbar-default top_menu">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php $url = Request::segment(2); ?>

                    <li class="{{ ( Request::segment(2) == '' ) ? "menu_active" : ''}}"><a href="{{ url('/') }}">{{ trans('common.home') }}</a>
                    </li>

                    @foreach($categories as $category)
                        <li @if( urldecode($url) == $category->category) class="menu_active" @endif><a
                                    href="{{ url('blogs/'.$category->category) }}">{{$category->category}}</a></li>
                    @endforeach

                </ul>

            </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
    </nav>








@yield('content')


<div class="post">


    <div class="about">
        <h3>{{ trans('common.recent'). ' ' . trans('common.post') }} </h3>
    </div>

    @foreach($recent_blogs as $blog)
        <div class="rpost">
            <div class="imge">
                <a href="#"><img
                            src="@if($blog->image){{ url('poster/'. $blog->image) }}@else {{ url('img/'. 'default.jpg') }} @endif"
                            alt="bloger"></a>
            </div>
            <div class="detail">
                <h4>
                    <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}">{{$blog->title}}</a>
                </h4>
            </div>
        </div>
    @endforeach


</div>


<!-- sigh up   -->

<div class="signup">
    <div class="about">
        <h3> {{ trans('common.subscribe') }}</h3>
    </div>
    <div class="detail">
        <p>{{ trans('common.subscribe_text') }}</p>
    </div>
    <div class="Sign">
        {!! Form::open(['url' => "subscribe",'id'=>'subscribe','class'=>'form-horizontal dropzone', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No']) !!}
        <span class="text-danger">{{ $errors->first('email') }}</span>
        <div class="input-group">
            {!! Form::text('email',null, ['id' => 'email', 'class' =>'form-control','maxlength' => '200', 'placeholder'=>trans('blog.subscribe').' '.trans('common.email')]) !!}
            <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">{{ trans('common.sign') . ' '. trans('common.up')}}</button>
                                      </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- Category -->

<div class="category">
    <div class="about">
        <h3>{{ trans('common.category') }}</h3>
    </div>
    <div class="category_menu">
        <ul class="nav nav-pills nav-stacked">
            @foreach($categories as $category)
                <li><a href="{{ url('blogs/'.$category->category) }}"><i class="fa fa-angle-double-right"
                                                                         aria-hidden="true"></i> {{$category->category}}
                    </a></li>
            @endforeach
        </ul>
    </div>
</div>

</div>


</div>
</div>
</article>
<!-- carosel -->


<article style="margin-bottom:10px;">

    <div class="container-fluid">
        <div class="row">
            <div class="">

                <div class="clearout"></div>

                <ul id="flexiselDemo3">
                
                    @foreach($blogs as $blog)
                        <li>
                            <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}"><img
                                        src="@if($blog->image){{ url('poster/'. $blog->image) }}@else {{ url('img/'. 'default.jpg') }} @endif"
                                        alt=""></a></li>
                    @endforeach


                </ul>

            </div>

        </div>
    </div>


</article>



<footer class="footer_2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <h3>{!! basic('services_head') !!}</h3>
                <p>{!! basic('services') !!}</p>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <h3>{{ trans('common.latest') . ' '. trans('common.blogs') }}</h3>
                <div class="category_menu">
                    <ul class="nav nav-pills nav-stacked">

                        @foreach($recent_blogs as $blog)
                            <li>
                                <a href="{{ url('blogs/'. $blog->id .'/'. str_replace('+','-', urlencode($blog->title))) }}"><i
                                            class="fa fa-angle-double-right" aria-hidden="true"></i> {{$blog->title}}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 sfooter">
                <h3>{{ trans('common.contact') . ' '. trans('common.us') }}</h3>
                <div><p>{!! basic('contact') !!}</p></div>
            </div>

        </div>
    </div>
</footer>


<footer class="footer_1">
    <div class="container-fluid">



        <ul class="clearlist socialList">
            <li><a href="{!! basic('facebook') !!}"><i class="fa fa-facebook"></i><span
                            class="hidden-xs"> Facebook </span></a></li>
            <li><a href="{!! basic('twitter') !!}"><i class="fa fa-twitter"></i><span
                            class="hidden-xs"> Twitter</span></a></li>
            <li><a href="{!! basic('linkedin') !!}"><i class="fa fa-linkedin"></i><span
                            class="hidden-xs"> Linkedin</span></a></li>
            <li><a href="{!! basic('google-plus') !!}"><i class="fa fa-google-plus"></i><span
                            class="hidden-xs"> google</span></a></li>
            <li><a href="{!! basic('instagram') !!}"><i class="fa fa-instagram"></i><span
                            class="hidden-xs"> instagram</span></a></li>
        </ul>
        <hr>

        <ul class="clearlist socialList" style="margin-top:10px;">
            @foreach($pages as $page)
                <li @if( urldecode($url) == $page->title) class="menu_active" @endif style="text-transform:none;font-size:12px;">
                <a href="{{ url('blogs/'.$page->title) }}">{{$page->title}}</a></li>
            @endforeach
        </ul>

    </div>
</footer>
<footer class="copyright">
    <div class="container-fluid">
        <div class="row">
            <div class="hij">
                <h6>{!! basic('copyright') !!}</h6>
            </div>
        </div>
    </div>
</footer>

<!-- footer_2 -->

<script>
    $('audio,video').mediaelementplayer({
        //mode: 'shim',
        success: function(media, player, node) {
            $('#' + node.id + '-mode').html('mode: ' + player.pluginType);
            $('#' + node.id + '-mode').html('mode: ' + media.pluginType);
        }
    });

    </script>  


<script type="text/javascript">

    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('.top_menu').addClass('menu_fix');
        } else {
            $('.top_menu').removeClass('menu_fix');
        }
    });

    $('.navbar-header').click(function(){
        $('.top_menu').toggleClass('menu_fix');
    });

      

    $(window).load(function () {
        $("#flexiselDemo1").flexisel();
        $("#flexiselDemo2").flexisel({
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

        $("#flexiselDemo3").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });

        $("#flexiselDemo4").flexisel({
            clone: false
        });

    });
</script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script id="dsq-count-scr" src="//dhakablogs.disqus.com/count.js" async></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-575bcadfc283e06c"></script>

</body>
</html>






