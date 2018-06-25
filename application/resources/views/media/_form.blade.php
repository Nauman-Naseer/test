
<div class="form-group required {{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title',trans('common.title')) !!}
    {!! Form::text('title',null, ['id' => 'title', 'class' =>'form-control', 'required' => 'true']) !!}
    <p class="text-danger">{{$errors->first('title')}}</p>
</div>

<div class="form-group required {{ $errors->has('media') ? ' has-error' : '' }}">
    {!! Form::label('media',trans('common.media')) !!}
    <div class="clear"></div>
    
    @if( !empty($media->path) )
            <img src=" {{ url('/poster/' . $media->path) }}  " alt="">
            <h4 style="color:red;">If you change image, Select New One.</h4>
    @endif

    {!! Form::file('media',null, ['id' => 'media', 'class' =>'form-control', 'required' => 'true']) !!}
    <p class="text-danger">{{$errors->first('media')}}</p>
</div>

<div class="form-group">
    {!! Form::submit($submit_button,['class' => 'btn btn-sm btn-primary'])!!}
</div>