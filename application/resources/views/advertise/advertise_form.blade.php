
<div class="form-group {{ $errors->has('banner') ? ' has-error' : '' }}">

    {!! Form::label('banner',trans('blog.banner')) !!}
    {!! Form::textarea('banner',isset($basics['banner'])?$basics['banner']:null, ['id' => 'banner', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('blog.banner').' '.trans('blog.add_js_code')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('banner')}}
    </span>

</div>

<div class="form-group {{ $errors->has('sidebar') ? ' has-error' : '' }}">

    {!! Form::label('sidebar',trans('blog.sidebar')) !!}
    {!! Form::textarea('sidebar',isset($basics['sidebar'])?$basics['sidebar']:null, ['id' => 'sidebar', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('blog.sidebar').' '.trans('blog.add_js_code')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('sidebar')}}
    </span>

</div>


<div class="form-group {{ $errors->has('single') ? ' has-error' : '' }}">

    {!! Form::label('single',trans('blog.single')) !!}
    {!! Form::textarea('single',isset($basics['single'])?$basics['single']:null, ['id' => 'single', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('blog.single').' '.trans('blog.add_js_code')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('single')}}
    </span>

</div>




{!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}