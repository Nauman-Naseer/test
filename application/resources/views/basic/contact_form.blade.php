
<div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}">

    {!! Form::label('contact',trans('blog.contact').' '.trans('blog.us') ) !!}
    {!! Form::textarea('contact',isset($basics['contact'])?$basics['contact']:null, ['id' => 'contact', 'class' =>'form-control', 'placeholder' => trans('common.enter').' '.trans('blog.contact').' '.trans('blog.us').' '.trans('blog.info'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('contact')}}
    </span>

</div>



{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}