<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
    {!! Form::label('category',trans('blog.blog').' '.trans('blog.category'),['class'=>' col-lg-3 col-md-3 control-label company-label']) !!}
    <div class="col-lg-9 col-md-9">
        {!! Form::text('category',null, ['id' => 'category', 'class' =>'form-control','maxlength' => '200', 'placeholder'=>trans('blog.blog').' '.trans('blog.category')]) !!}
        <span class="text-danger">
        {{$errors->first('category')}}
        </span>
    </div>
</div>


<div class="form-group {{ $errors->has('cat_side') ? ' has-error' : '' }}">
    {!! Form::label('cat_side',trans('blog.sidebar').' '.trans('blog.advertisement'),['class'=>' col-lg-3 col-md-3 control-label company-label']) !!}
    <div class="col-lg-9 col-md-9">
        {!! Form::textarea('cat_side',null, ['id' => 'cat_side', 'class' =>'form-control', 'placeholder'=>trans('blog.category').' '.trans('blog.advertisement').' '.trans('blog.code')]) !!}
        <span class="text-danger">
        {{$errors->first('cat_side')}}
        </span>
    </div>
</div>

<div class="form-group {{ $errors->has('cat_ad') ? ' has-error' : '' }}">
    {!! Form::label('cat_ad',trans('blog.bottom').' '.trans('blog.advertisement'),['class'=>' col-lg-3 col-md-3 control-label company-label']) !!}
    <div class="col-lg-9 col-md-9">
        {!! Form::textarea('cat_ad',null, ['id' => 'cat_ad', 'class' =>'form-control', 'placeholder'=>trans('blog.category').' '.trans('blog.advertisement').' '.trans('blog.code')]) !!}
        <span class="text-danger">
        {{$errors->first('cat_ad')}}
        </span>
    </div>
</div>



<div class="col-lg-5 col-lg-offset-3">
    <button type="submit" class="btn btn-danger">{{trans('common.submit')}}</button>
    <button type="reset" class="btn btn-primary pull-right">{{trans('common.reset')}}</button>
</div>
