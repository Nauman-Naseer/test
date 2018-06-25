
<div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">

    {!! Form::label('about',trans('blog.about').' '.trans('blog.us') ) !!}
    {!! Form::textarea('about',isset($basics['about'])?$basics['about']:null, ['id' => 'about', 'class' =>'form-control', 'placeholder' => trans('common.enter').' '.trans('blog.about').' '.trans('blog.us'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('about')}}
    </span>

</div>

{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}