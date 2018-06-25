<div class="form-group {{ $errors->has('services_head') ? ' has-error' : '' }}">

    {!! Form::label('services_head',trans('blog.services').' '.trans('blog.headline') ) !!}
    {!! Form::text('services_head',isset($basics['services_head'])?$basics['services_head']:null, ['id' => 'services_head', 'class' =>'form-control', 'placeholder' => trans('common.enter').' '.trans('blog.services').' '.trans('blog.headline'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('services_head')}}
    </span>

</div>


<div class="form-group {{ $errors->has('services') ? ' has-error' : '' }}">

    {!! Form::label('services',trans('blog.our').' '.trans('blog.services') ) !!}
    {!! Form::textarea('services',isset($basics['services'])?$basics['services']:null, ['id' => 'services', 'class' =>'form-control', 'placeholder' => trans('common.enter').' '.trans('blog.our').' '.trans('blog.services').' '.trans('blog.info'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('services')}}
    </span>

</div>

{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}