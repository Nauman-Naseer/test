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
                  <th>{{trans('blog.category')}}</th>
                  <th>{{trans('blog.created').' '.trans('blog.time')}}</th>
                  <th>{{ trans('common.action') }}</th>
                </tr>
                <?php $sl=1; ?>

                @foreach($categories as $category)

                <tr>
                  <td> {{$sl}} </td>
                  <td> <a href='{{url("blogs/". $category->category) }}' target="_blank" data-toggle="tooltip" title="{!! $category->category !!}"> {!! $category->category !!} </a></td>
                  <td>{{date('jS F, Y', strtotime($category->created_at) )}}</td>
                 <td>
                      {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id], 'class' => 'delete-form']) !!}
                             {!! btn_edit("category/$category->id/edit") !!}
                             {!! btn_delete_submit() !!}
                      {!! Form::close() !!}
                  </td>
                </tr>
                <?php $sl++; ?>
                @endforeach
                
              </table>
        </div>
    </div>
@endsection



<style>
    .row{
      margin-top: 20px;
    }
    .content-header > .breadcrumb{
      overflow: hidden;
      display: block;
    }
</style>