<div id="php-mail">
    <div class="form-group required">

        <div class="col-md-3">
            <label class="radio-inline pull-right">
                Mail Driver
            </label>
        </div>
        <div class="col-md-7">
            <label class="radio-inline">
                <input type="radio" name="mail_driver" value="mail"
                       {{ (env('MAIL_DRIVER') == 'mail')? 'checked' : '' }} class="mail_driver_select"> {!! trans('common.phpmail') !!}
            </label>
            <label class="radio-inline">
                <input type="radio" name="mail_driver" value="smtp"
                       {{ (env('MAIL_DRIVER') == 'smtp')? 'checked' : '' }} class="mail_driver_select"> {!! trans('common.SMTP') !!}
            </label>
        </div>
    </div>
</div>


<div id="smtp" style="display:{{ (env('MAIL_DRIVER') == 'smtp')? 'block' : 'none' }}">
    <div class="form-group required">
        {!! Form::label('smtp_host',trans('common.smtp_host_name'),['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('smtp_host',isset($config['smtp_host'])?$config['smtp_host']:null, ['id' => 'smtp_host', 'class' =>'form-control', 'placeholder' => 'Enter'.' '.trans('common.smtp_host_name'),]) !!}
            {{$errors->first('smtp_host')}}

        </div>
    </div>


    <div class="form-group required">

        {!! Form::label('smtp_username',trans('common.smtp_username'),['class'=>'col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('smtp_username',isset($config['smtp_username'])?$config['smtp_username']:null, ['id' => 'smtp_username', 'class' =>'form-control ', 'placeholder' => 'Enter'.''.trans('common.smtp_username') ]) !!}
            {{$errors->first('smtp_username')}}

        </div>

    </div>

    <div class="form-group required">

        {!! Form::label('smtp_password',trans('common.SMTP Password'),['class'=>' col-md-3 control-label']) !!}


        <div class="col-md-7">
            <input type="password" value="{!! isset($config['smtp_password'])?$config['smtp_password']:null !!}"
                   class="form-control"/>
            {{$errors->first('smtp_password')}}
        </div>

    </div>

    <div class="form-group required">

        {!! Form::label('smtp_port',trans('common.SMTP Port') ,['class'=>' col-md-3 control-label']) !!}

        <div class="col-md-7">
            {!! Form::text('smtp_port',isset($config['smtp_port'])?$config['smtp_port']:null, ['id' => 'smtp_port', 'class' =>'form-control ']) !!}
            {{$errors->first('smtp_port')}}

        </div>

    </div>
</div>

<div class="form-group required">

    {!! Form::label(null,null,['class'=>' col-md-3 control-label']) !!}

    <div class="col-md-7">
        {!! Form::submit($submit_button,['class' => 'btn btn-primary'])!!}

    </div>

</div>
