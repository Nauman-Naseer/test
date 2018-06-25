

<div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">

    {!! Form::label('logo', trans('blog.main').' '.trans('blog.logo') ) !!}

    <img src="{!! isset($basics['logo'])? 'img/'. $basics['logo'] : null !!}" alt="" style="width:150px;height:100px;margin:20px;">

    {!!  Form::file('logo', null, ['id' => 'logo', 'class' =>'form-control']) !!}
    <span class="text-danger help-block">
        {{$errors->first('logo')}}
    </span>

</div>

<div class="form-group {{ $errors->has('site_name') ? ' has-error' : '' }}">

    {!! Form::label('site_name',trans('common.site_name')) !!}
    {!! Form::text('site_name',isset($basics['site_name'])?$basics['site_name']:null, ['id' => 'site_name', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('common.site_name'),]) !!}
    <span class="text-danger help-block">
        {{$errors->first('site_name')}}
    </span>

</div>

<div class="form-group {{ $errors->has('tag_name') ? ' has-error' : '' }}">

    {!! Form::label('tag_name',trans('common.tag_name')) !!}
    {!! Form::text('tag_name',isset($basics['tag_name'])?$basics['tag_name']:null, ['id' => 'tag_name', 'class' =>'form-control', 'placeholder' => trans('blog.enter'). ' '.trans('common.tag_name')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('tag_name')}}
    </span>

</div>
{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}