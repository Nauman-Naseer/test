
<div class="form-group {{ $errors->has('copyright') ? ' has-error' : '' }}">

    {!! Form::label('copyright',trans('blog.copyright').' '.trans('blog.text') ) !!}
    {!! Form::text('copyright',isset($basics['copyright'])?$basics['copyright']:null, ['id' => 'copyright', 'class' =>'form-control', 'placeholder' => trans('common.enter').' '.trans('blog.copyright').' '.trans('blog.text'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('copyright')}}
    </span>

</div>

{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}