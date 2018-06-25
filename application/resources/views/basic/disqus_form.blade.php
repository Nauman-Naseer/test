
<div class="form-group {{ $errors->has('disqus') ? ' has-error' : '' }}">

    {!! Form::label('disqus',trans('blog.disqus').' '.trans('blog.us') ) !!}
    {!! Form::text('disqus',isset($basics['disqus'])?$basics['disqus']:null, ['id' => 'disqus', 'class' =>'form-control', 'placeholder' => trans('common.enter').' '.trans('blog.disqus')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('disqus')}}
    </span>

</div>

{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}