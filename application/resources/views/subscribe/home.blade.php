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
                    <div class="panel-heading text-center" style="cursor:pointer"> <h3>{{ trans('blog.subscribe').' '.trans('common.email') }}</h3> </div>
                    <div class="panel-body">
                        <div class="col-md-10 col-md-offset-1">
                                @if($pageName == trans('common.edit').' '.trans('blog.subscriber'))
                                    {!! Form::model($subscribe, ['method'=> 'PUT', 'url' => ['subscribe',$subscribe->id],'class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files'=>'yes']) !!}
                                @else
                                    {!! Form::open(['url' => "subscribe",'id'=>'subscribe','class'=>'form-horizontal dropzone', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files'=>'yes']) !!}
                                @endif
                                @include('subscribe._form')
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-sm-12">
            <table class="table table-border">
                <tr>
                  <th>{{ trans('blog.sl') }}</th>
                  <th>{{ trans('common.email') }}</th>
                  <th>{{ trans('blog.status') }}</th>
                  <th>{{ trans('blog.created') }}</th>
                  <th>{{ trans('common.edit') }}</th>
                  <th>{{ trans('common.delete') }}</th>
                </tr>
                <?php $sl=1; ?>

                @foreach($subscibers as $subscriber)
                

                <tr>
                  <td> {{$sl}} </td>
                  <td> <a href="#"> {!! $subscriber->email !!} </a></td>
                  <td> @if( ($subscriber->status) == 1 ) <button class="btn btn-primary">{!! trans('blog.activated') !!} </button>  @elseif(( $subscriber->status) == 0 ) <button class="btn btn-danger">{!! trans('blog.deactived') !!} </button> @endif</td>
                  <td>{{date('jS F, Y', strtotime($subscriber->created_at) )}}</td>
                 <td> {!! btn_edit("subscribe/$subscriber->id/edit") !!}  </td>
                 <td>
                      {!! Form::open(['method' => 'DELETE', 'route' => ['subscribe.destroy', $subscriber->id], 'class' => 'delete-form']) !!}
                            {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                      {!! Form::close() !!}
                  </td>
                </tr>
                <?php $sl++; ?>
                @endforeach
              </table>
        </div>
    </div>


    
@endsection
