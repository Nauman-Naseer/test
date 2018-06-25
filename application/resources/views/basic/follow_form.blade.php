
<div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">

    {!! Form::label('facebook',trans('common.facebook')) !!}
    {!! Form::text('facebook',isset($basics['facebook'])?$basics['facebook']:null, ['id' => 'facebook', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('common.facebook').' '.trans('blog.link')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('facebook')}}
    </span>

</div>


    <div class="form-group {{ $errors->has('twitter') ? ' has-error' : '' }}">

        {!! Form::label('twitter',trans('common.twitter')) !!}
        {!! Form::text('twitter',isset($basics['twitter'])?$basics['twitter']:null, ['id' => 'twitter', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('common.twitter').' '.trans('blog.link')]) !!}
        <span class="text-danger help-block">
        {{$errors->first('twitter')}}
    </span>

    </div>


    <div class="form-group {{ $errors->has('linkedin') ? ' has-error' : '' }}">

        {!! Form::label('linkedin',trans('common.linkedin')) !!}
        {!! Form::text('linkedin',isset($basics['linkedin'])?$basics['linkedin']:null, ['id' => 'linkedin', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('common.linkedin').' '.trans('blog.link')]) !!}
        <span class="text-danger help-block">
        {{$errors->first('linkedin')}}
    </span>

    </div>




    <div class="form-group {{ $errors->has('google-plus') ? ' has-error' : '' }}">

        {!! Form::label('google-plus',trans('blog.google-plus')) !!}
        {!! Form::text('google-plus',isset($basics['google-plus'])?$basics['google-plus']:null, ['id' => 'google-plus', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('blog.google-plus').' '.trans('blog.link')]) !!}
        <span class="text-danger help-block">
        {{$errors->first('google-plus')}}
    </span>

    </div>

<div class="form-group {{ $errors->has('instagram') ? ' has-error' : '' }}">

    {!! Form::label('instagram',trans('blog.instagram')) !!}
    {!! Form::text('instagram',isset($basics['instagram'])?$basics['instagram']:null, ['id' => 'instagram', 'class' =>'form-control', 'placeholder' => trans('blog.enter').' '.trans('blog.instagram').' '.trans('blog.link')]) !!}
    <span class="text-danger help-block">
        {{$errors->first('instagram')}}
    </span>

</div>

    {!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}