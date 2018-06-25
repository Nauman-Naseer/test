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
                    <div class="panel-heading text-center" style="cursor:pointer"> <h3>{{ trans('blog.blog').' '.trans('blog.position') }}</h3> </div>
                    <div class="panel-body">
                        <div class="col-md-9 col-md-offset-1">
                                @if($pageName == trans('common.edit').' '.trans('blog.position'))
                                    {!! Form::model($position, ['method'=> 'PUT', 'url' => ['position',$position->id],'class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files'=>'yes']) !!}
                                @else
                                    {!! Form::open(['url' => "position",'id'=>'position','class'=>'form-horizontal dropzone', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files'=>'yes']) !!}
                                @endif
                                @include('position._form')
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
        </div>
         <div class="col-md-8 col-md-offset-2">
            <table class="table table-border">
                <tr>
                  <th>{{trans('blog.sl')}}</th>
                  <th>{{trans('blog.position').' '.trans('common.name')}}</th>
                  <th>{{ trans('common.edit') }}</th>
                  <th>{{ trans('common.delete') }}</th>
                </tr>
                <?php $sl=1; ?>

                @foreach($positions as $position)
                

                <tr>
                  <td> {{$sl}} </td>
                  <td> <a href="#"> {!! $position->position !!} </a></td>
                 <td> {!! btn_edit("position/$position->id/edit") !!}  </td>
                 <td>
                      {!! Form::open(['method' => 'DELETE', 'route' => ['position.destroy', $position->id], 'class' => 'delete-form']) !!}
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
