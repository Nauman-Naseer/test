<div class="form-group {{ $errors->has('position') ? ' has-error' : '' }}">
    {!! Form::label('position',trans('blog.position').' '.trans('common.name'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-9">
        {!! Form::text('position',null, ['id' => 'position', 'class' =>'form-control','maxlength' => '200', 'placeholder'=>trans('blog.position').' '.trans('common.name') ]) !!}
        <span class="text-danger">
        {{$errors->first('position')}}
        </span>
    </div>
</div>




<div class="col-lg-5 col-lg-offset-3">
    <button type="submit" class="btn btn-danger">{{trans('common.submit')}}</button>
    <button type="reset" class="btn btn-primary pull-right">{{trans('common.reset')}}</button>
</div>
