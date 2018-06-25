<div class="form-group required">
    {!! Form::label('name',trans('auth.fullname'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('name',null, ['id' => 'name', 'class' =>'form-control ', 'required' => 'true']) !!}
        <p class="text-danger">{{$errors->first('name')}}</p>
    </div>
</div>
<div class="form-group required">
    {!! Form::label('email',trans('common.email'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-5">
        {!! Form::text('email',null, ['id' => 'email', 'class' =>'form-control ', 'required' => 'true']) !!}
        <p class="text-danger">{{$errors->first('email')}}</p>
    </div>
</div>

<div class="form-group required">
    {!! Form::label('role_id',trans('auth.user_role'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-3">
        {!! Form::select('role_id', $roles, null, ['id' => 'role_id', 'class' =>'form-control ', 'required' => 'true', 'placeholder'=>trans('blog.select').' '.trans('auth.user_role') ]) !!}

        <p class="text-danger">{{$errors->first('role_id')}}</p>
    </div>
</div>

<div class="form-group required">
    {!! Form::label('password',trans('common.password'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-5">
        {!! Form::password('password', ['id' => 'password', 'class' =>'form-control ', 'maxlength' => '50']) !!}
        <p class="text-danger">{{$errors->first('password')}}</p>
    </div>
</div>

<div class="form-group required">
    {!! Form::label('password',trans('common.Retype').' '.trans('common.password'),['class'=>' col-lg-3 control-label company-label']) !!}
    <div class="col-lg-5">
        {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' =>'form-control ', 'maxlength' => '50']) !!}
        <p class="text-danger">{{$errors->first('password')}}</p>
    </div>
</div>


<div class="form-group">
    <div class="col-lg-5 col-lg-offset-3">
        {!! Form::submit($submit_button,['class' => 'btn btn-sm btn-primary pull-right'])!!}
    </div>
</div>
