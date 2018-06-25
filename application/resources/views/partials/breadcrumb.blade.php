<?php
$url = Request::segment(1);
if ($url == '' || $url == 'home' || $url == 'dashboard') {
    $breadCrumb = trans('common.Dashboard');
}else if ($url == 'allblog') {
    $breadCrumb = trans('blog.all'). ' '.trans('blog.blog');
} else if ($url == 'blog') {
    $breadCrumb = trans('blog.new'). ' '.trans('blog.blog');
} else if ($url == 'allcategory') {
    $breadCrumb = trans('blog.all'). ' '.trans('blog.category');
} else if ($url == 'category') {
    $breadCrumb = trans('blog.new'). ' '.trans('blog.category');
} else if ($url == 'users') {
    $breadCrumb = trans('common.users');
} else if ($url == 'activities') {
    $breadCrumb = trans('common.Activities');
} else if ($url == 'oauth') {
    $breadCrumb = trans('common.Oauth') . ' ' . trans('common.Settings');
    if (Request::get('platform') == 'facebook' || Request::get('platform') == '') {
        $platform = trans('common.facebook');
    } else if (Request::get('platform') == 'google') {
        $platform = trans('common.google');
    } else if (Request::get('platform') == 'twitter') {
        $platform = trans('common.twitter');
    } else if (Request::get('platform') == 'linkedin') {
        $platform = trans('common.linkedin');
    } else if (Request::get('platform') == 'github') {
        $platform = trans('common.github');
    }
} else if ($url == 'email') {
    $breadCrumb =  trans('common.Oauth') . ' ' . trans('common.Settings');
    $subMenu = 'Email Settings';
} else if ($url == 'basic') {
    $breadCrumb =  trans('common.Settings');
    $subMenu = 'Basic Settings';
} else if ($url == 'position') {
    $breadCrumb =  trans('common.Settings');
    $subMenu = 'Position Settings';
} else if ($url == 'subscribe') {
    $breadCrumb =  trans('common.Settings');
    $subMenu = 'Subscribe Settings';
} else if ($url == 'theme') {
    $breadCrumb =  trans('common.Oauth') . ' ' . trans('common.Settings');
    $subMenu =  trans('common.Theme') . ' ' . trans('common.Settings');
} else if ($url == 'translation') {
    $breadCrumb =  trans('common.Oauth') . ' ' . trans('common.Settings');
    $subMenu =  trans('common.Translation') ;
} else if ($url == 'profile') {
    $breadCrumb =  trans('common.Profile');
} else if ($url == 'privacy') {
    $breadCrumb =  trans('common.privacy');
} else if ($url == 'advertisement') {
    $breadCrumb =  trans('blog.advertisement');
} else {
    $breadCrumb = 'N/A';
}
?>
<ol class="breadcrumb">
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">{{ $breadCrumb }}</li>
    @if(isset($platform))
        <li class="active">{{ $platform }} </li>
    @elseif(isset($subMenu))
        <li class="active">{{ $subMenu }} </li>
    @endif
</ol>

