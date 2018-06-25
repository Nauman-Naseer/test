@extends('app')


@section('main-content')
    <div class="row" style="margin-top: 25px">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked navbar-custom-nav">

                <li class="<?php echo (Request::get('platform') == 'basic') || (Request::get('platform') == '')? 'active' : null; ?>">
                    <a href="{{ url('/basic?platform=basic') }}">
                        <i class="fa fa-home"></i>
                        {!! trans('blog.basic') !!}
                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'about' ? 'active' : null; ?>">
                    <a href="{{ url('/basic?platform=about') }}">
                        <i class="fa fa-bank"></i>
                        {!! trans('blog.about') !!}

                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'services' ? 'active' : null; ?>">
                    <a href="{{ url('/basic?platform=services') }}">
                        <i class="fa fa-question"></i>
                        {!! trans('blog.services') !!}
                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'contact' ? 'active' : null; ?>">
                    <a href="{{ url('/basic?platform=contact') }}">
                        <i class="fa fa-phone"></i>
                        {!! trans('blog.contact') !!}
                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'follow' ? 'active' : null; ?>">
                    <a href="{{ url('/basic?platform=follow') }}">
                        <i class="fa fa-facebook"></i>
                        {!! trans('blog.follow') !!}
                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'copyright' ? 'active' : null; ?>">
                    <a href="{{ url('/basic?platform=copyright') }}">
                        <i class="fa fa-copyright"></i>
                        {!! trans('blog.copyright') !!}
                    </a>
                </li>

                <li class="<?php echo Request::get('platform') == 'disqus' ? 'active' : null; ?>">
                    <a href="{{ url('/basic?platform=disqus') }}">
                        <i class="fa fa-comment"></i>
                        {!! trans('blog.disqus') !!}
                    </a>
                </li>


            </ul>
        </div>

        <div class="col-md-6">
            <section class="box box-default" style="margin-top: 0px">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$pageName}}</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => "/basic",'id'=>'basic','class'=>'', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files'=>'yes']) !!}
                    @if(Request::get('platform'))
                        @include("basic.". Request::get('platform') . "_form",['submit_button' => 'Submit'])
                    @else
                        @include("basic.basic_form",['submit_button' => 'Submit'])
                    @endif
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>
@endsection