<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email',trans('blog.subscribe').' '.trans('common.email'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-8">
        {!! Form::text('email',null, ['id' => 'email', 'class' =>'form-control','maxlength' => '200', 'placeholder'=>trans('blog.subscribe').' '.trans('common.email')]) !!}
        <span class="text-danger">
        {{$errors->first('email')}}
        </span>
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
    {!! Form::label('status',trans('blog.blog').' '.trans('blog.status'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-4">
        {!! Form::select('status',['1'=>'Active','0'=>'Deactive'],null, ['id' => 'status', 'class' =>'form-control','maxlength' => '200', 'placeholder'=>trans('blog.status')]) !!}
        <span class="text-danger">
        {{$errors->first('status')}}
        </span>
    </div>
</div>




<div class="col-lg-5 col-lg-offset-3">
    <button type="submit" class="btn btn-danger">{{trans('common.submit')}}</button>
    <button type="reset" class="btn btn-primary pull-right">{{trans('common.reset')}}</button>
</div>
