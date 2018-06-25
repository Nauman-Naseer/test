<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title',trans('blog.page').' '.trans('blog.title'),['class'=>' col-lg-2 control-label company-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('title',null, ['id' => 'title', 'class' =>'form-control','maxlength' => '500', 'placeholder'=>trans('blog.page').' '.trans('blog.title')]) !!}
        <span class="text-danger">
        {{$errors->first('title')}}
        </span>
    </div>
</div>


<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image',trans('common.upload').' '.trans('blog.image'),['class'=>' col-lg-2 control-label company-label']) !!}
    <div class="col-lg-5">        

         <span class="btn btn-link"><a href="#" data-toggle="modal" data-target="#imageUploadModal" onclick="loadModal()">{{ trans('common.media'). ' ' . trans('common.import')}}</a></span>   
        
        <img src="" id="importimage" alt="" class="hide">
        <div class="clear"></div>

         @if( !empty($page->image) )
            <img src=" {{ url('/poster/' . $page->image) }} " alt="">
            <h4 style="color:red;">If you change image, Import new one.</h4>
        @endif

       {!! Form::text('image',null, ['id' => 'image', 'class' =>'form-control hidden']) !!}
        <span class="text-danger">
        {{$errors->first('image')}}
        </span>


    </div>
</div>


<div class="form-group {{ $errors->has('blog') ? ' has-error' : '' }}">
    {!! Form::label('blog',trans('blog.page').' '.trans('blog.text'),['class'=>' col-md-2 control-label company-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('blog',null, ['id' => 'blog', 'class' =>'form-control ', 'placeholder'=>trans('blog.text')]) !!}
        <span class="text-danger">
            {{$errors->first('blog')}}
        </span>
    </div>
</div>

{!! Form::text('user_id',$user->id, ['id' => 'user', 'class' =>'form-control hidden' ]) !!}




<div class="col-lg-5 col-lg-offset-3">
    <button type="submit" class="btn btn-danger">{{trans('common.submit')}}</button>
    <button type="reset" class="btn btn-primary pull-right">{{trans('common.reset')}}</button>
</div>
