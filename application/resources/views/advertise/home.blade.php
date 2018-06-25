@extends('app')


@section('main-content')
    <div class="row" style="margin-top: 25px">
        <div class="col-md-1"></div>


        <div class="col-md-9">
            <section class="box box-default" style="margin-top: 0px">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$pageName}}</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => "/advertisement",'id'=>'advertise','class'=>'', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files'=>'yes']) !!}
                    @if(Request::get('platform'))
                        @include("advertise.". Request::get('platform') . "_form",['submit_button' => 'Submit'])
                    @else

                        @include("advertise.advertise_form",['submit_button' => 'Submit'])
                    @endif
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>
@endsection