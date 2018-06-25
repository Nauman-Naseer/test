@extends('app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')
    <div class="row">


        <div class="col-sm-12">
            <table class="table table-border">
                <tr>
                    <th>{{trans('blog.sl')}}</th>
                    <th>{{trans('common.title')}}</th>
                    <th>{{trans('common.photo')}}</th>
                    <th>{{trans('blog.position')}}</th>
                    <th>{{trans('blog.status')}}</th>
                    <th>{{trans('blog.created').' '.trans('blog.time')}}</th>
                    <th>{{ trans('common.action') }}</th>
                </tr>
                <?php $sl = 1;

                $slider_list = json_decode(configValue('slider_list'));
                $feature_list = json_decode(configValue('feature_list'));
                $main_feature = configValue('main_feature');
                $about_img = configValue('about_img');




                ?>

                @foreach($allblog as $blog)

                    <tr>
                        <td> {{$sl}} </td>
                        <td>
                            <a href='{{ url("/blogs/". $blog->id . "/" . str_replace('+','-', urlencode($blog->title)) ) }}'
                               target="_blank" data-toggle="tooltip"
                               title="{!!$blog->title!!}"> {!! blog($blog->title, 5) !!} </a></td>
                        <td class="blog"><img
                                        src="@if($blog->image){{ url('/poster/' . $blog->image) }}@else {{ url('/img/default.png') }} @endif"
                                        alt=""> </td>
                        <td>
                            @if( $blog->position_id  !=0 )
                                <button class="btn btn-primary">
                                    {!! \App\Models\Position\Position::find($blog->position_id)->position !!}
                                </button>
                            @endif
                        </td>
                        <td>
                            @if( ($blog->position_id)  !=0 && ($about_img ==$blog->id || $main_feature ==$blog->id || in_array($blog->id, $slider_list) || in_array($blog->id, $feature_list) ))
                                <button class="btn btn-success" data-toggle="tooltip" title="Active">
                                    {!! trans('blog.active') !!}
                                </button>
                            @elseif($blog->position_id)
                                <button class="btn btn-warning" data-toggle="tooltip" title="Inactive">
                                    {!! trans('blog.inactive') !!}
                                </button>
                            @endif

                        </td>
                        <td>{{ date('jS F, Y', strtotime($blog->created_at) )}}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $blog->id], 'class' => 'delete-form']) !!}
                            {!! btn_edit("blog/$blog->id/edit") !!}
                            {!! btn_delete_submit() !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    <?php $sl++; ?>
                @endforeach

            </table>
            {!! $allblog->links() !!}
        </div>
    </div>
@endsection



<style>
    .row {
        margin-top: 20px;
    }

    .blog img {
        width: 80px;
        height: 60px;
    }

    .content-header > .breadcrumb {
        overflow: hidden;
        display: block;
    }
</style>