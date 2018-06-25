<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if (Auth::check() && (isset(Auth::user()->photo)) && (Auth::user()->photo != ''))
                    @if(strpos(Auth::user()->photo, 'http') !== false)
                        <img src="{{ Auth::user()->photo }}" style="height: 45px; width: 45px;" class="img-circle" alt="User Image" />
                    @else
                        <img src="{{ url('upload/'.Auth::user()->photo) }}" style="height: 45px; width: 45px;" class="img-circle" alt="User Image" />
                    @endif
                @else
                    <img src={{ url('img/user2-160x160.jpg') }} class="img-circle" alt="User Image" />
                @endif
            </div>
            <div class="pull-left info">
                @if(Auth::check())
                <p>{{ Auth::user()->name }}</p>
                @else
                <p>John Doe</p>
                @endif
                    <!-- Status -->
                @if(Auth::check())
                <a href="#"><i class="fa fa-circle text-success"></i> {!! trans('common.online') !!}</a>
                @endif
            </div>
        </div>
    <?php $url = Request::segment(1); ?>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="{{ ($url == 'dashboard')? "active" : ''}}"><a href="{{ url('dashboard') }}"><i class='fa fa-dashboard'></i> <span>{!! trans('common.Dashboard') !!}</span></a></li>
            <li class="{{ ($url == 'allblog')? "active" : ''}}"><a href="{{ url('allblog') }}"><i class='fa fa-newspaper-o'></i> <span>{!! trans('common.all').' '.trans('blog.blog') !!}</span></a></li>
            <li class="{{ ($url == 'blog')? "active" : ''}}"><a href="{{ url('blog') }}"><i class='fa fa-plus'></i> <span>{!! trans('blog.new').' '.trans('blog.blog') !!}</span></a></li>
            <li class="{{ ($url == 'media')? "active" : ''}}"><a href="{{ url('media') }}"><i class='fa fa-picture-o'></i> <span>{!! trans('common.media') !!}</span></a></li>
            <li class="{{ ($url == 'allcategory')? "active" : ''}}"><a href="{{ url('allcategory') }}"><i class='fa fa-tags'></i> <span>{!! trans('common.all').' '.trans('blog.category') !!}</span></a></li>
            <li class="{{ ($url == 'category')? "active" : ''}}"><a href="{{ url('category') }}"><i class='fa fa-plus'></i> <span>{!! trans('blog.new').' '.trans('blog.category') !!}</span></a></li>
            <li class="{{ ($url == 'page')? "active" : ''}}"><a href="{{ url('page') }}"><i class='fa fa-home'></i> <span>{!! trans('blog.pages') !!}</span></a></li>
            <li class="{{ ($url == 'users')? "active" : ''}}"><a href="{{ url('users') }}"><i class='fa fa-users'></i> <span>{!! trans('common.users') !!}</span></a></li>
            <li class="{{ ($url == 'activities')? "active" : ''}}"><a href="{{ url('activities') }}"><i class='fa fa-list-alt'></i> <span>{!! trans('common.Activities') !!}</span></a></li>
            <li class="{{ ($url == 'advertisement')? "active" : ''}}"><a href="{{ url('advertisement') }}"><i class='fa fa-list-alt'></i> <span>{!! trans('blog.advertisement') !!}</span></a></li>
            @if(Auth::check() &&  Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
            <li class="treeview {{ ( ($url == 'basic') || ($url == 'position') || ($url == 'subscribe') || ($url == 'oauth') || ($url == 'email') || ($url == 'theme')|| ($url == 'translation') || ($url == 'privacy')) ? "active" : ''}}">
                <a href="#"><i class='fa fa-cogs'></i> <span>{!! trans('common.settings') !!}</span> <i class="fa fa-angle-right pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ ($url == 'basic')? "active" : ''}}"><a href="{{ url('basic') }}"><i class='fa fa-home'></i> <span>{!! trans('blog.basic').' '.trans('common.settings') !!}</span></a></li>
                    <li class="{{ ($url == 'position')? "active" : ''}}"><a href="{{ url('position') }}"><i class='fa fa-child'></i> <span>{!! trans('blog.position').' '.trans('common.settings') !!}</span></a></li>
                    <li class="{{ ($url == 'subscribe')? "active" : ''}}"><a href="{{ url('subscribe') }}"><i class='fa fa-rss'></i> <span>{!! trans('blog.subscribe').' '.trans('common.settings') !!}</span></a></li>
                    <li class="{{ ($url == 'oauth')? "active" : ''}}"><a href="{{ url('oauth') }}"><i class='fa fa-facebook'></i> <span>{!! trans('common.oauth').' '.trans('common.settings') !!}</span></a></li>
                    <li class="{{ ($url == 'email')? "active" : ''}}"><a href="{{ url('email') }}"><i class='fa fa-envelope-o'></i> <span>{!! trans('common.email').' '.trans('common.settings') !!}</span></a></li>
                    <li class="{{ ($url == 'theme')? "active" : ''}}"><a href="{{ url('theme') }}"><i class='fa fa-codepen'></i> <span>{!! trans('common.Theme').' '.trans('common.settings') !!}</span></a></li>
                    <li class="{{ ($url == 'translation')? "active" : ''}}"><a href="{{ url('translation') }}"><i class='fa fa-language'></i> <span>{!! trans('common.Translation') !!}</span></a></li>
                    <li class="{{ ($url == 'privacy')? "active" : ''}}"><a href="{{ url('privacy') }}"><i class='fa fa-archive'></i> <span>{!! trans('common.privacy') !!}</span></a></li>
                </ul>
            </li>
            @endif
            <li class="{{ ($url == 'backupDownload')? "active" : ''}}"><a href="{{ url('backupDownload') }}"><i class='fa fa-database'></i> <span>{!! trans('common.backup') !!}</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
