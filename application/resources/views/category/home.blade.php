@extends('app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        </div>
        <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="cursor:pointer"> <h3>{{ trans('blog.blog').' '.trans('blog.category') }}</h3> </div>
                    <div class="panel-body">
                        <div class="col-md-9 col-md-offset-1">
                                @if($pageName == trans('common.edit').' '.trans('blog.category'))
                                    {!! Form::model($category, ['method'=> 'PUT', 'url' => ['category',$category->id],'class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files'=>'yes']) !!}
                                @else
                                    {!! Form::open(['url' => "category",'id'=>'category','class'=>'form-horizontal dropzone', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files'=>'yes']) !!}
                                @endif
                                @include('category._form')
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
        </div>
    </div>


    
@endsection
