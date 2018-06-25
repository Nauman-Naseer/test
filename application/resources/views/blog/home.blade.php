@extends('app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
    		<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
        </div>
        <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="cursor:pointer"> <h3>{{ trans('common.upload').' '.trans('blog.blog').' '.trans('blog.area') }}</h3> </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                                @if($pageName == trans('common.edit').' '.trans('blog.blog'))
                                    {!! Form::model($blog, ['method'=> 'PUT', 'url' => ['blog',$blog->id],'class'=>'form-horizontal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'Yes', 'files'=>'yes']) !!}
                                @else
                                    {!! Form::open(['url' => "blog",'id'=>'blogs','class'=>'form-horizontal dropzone', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files'=>'yes']) !!}
                                @endif
                                @include('blog._form')
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
        </div> 
    </div>


    <style>
        .note-group-select-from-files {
            display: none;
        }
    </style>

    


    <div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="myModalLabel">{{ trans('common.media'). ' ' . trans('common.import')}}</h4>
                </div>
                <div class="modal-body">
                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs">
                            <li @if ($errors->has()) class="" @else class="active" @endif >
                                <a href="#allMedia" data-toggle="tab" id="allMediaDiv">
                                    {{ trans('common.all') . ' '. trans('common.media')}}</a>
                            </li>
                                <li @if ($errors->has()) class="active" @else class="" @endif ><a
                                            href="#uploadImage"
                                            data-toggle="tab">{{ trans('common.upload'). ' ' . trans('common.image') }}</a>
                                </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- ************** general *************-->
                            <div @if ($errors->has()) class="tab-pane" @else class="tab-pane active"
                                 @endif id="allMedia">
                                <table class="table table-hover" id="dataTables_media">
                                    <thead>
                                    <tr class="active">
                                        <th class="col-sm-1">#</th>
                                        <th>{!! trans('common.title') !!}</th>
                                        <th>{!! trans('common.media') !!}</th>
                                        <th>{!! trans('common.action') !!}</th>
                                    </tr>
                                    </thead>
                                    <tbody>



                                    </tbody>
                                </table>
                            </div>
                            <div @if ($errors->has()) class="tab-pane active" @else class="tab-pane"
                                 @endif id="uploadImage">
                                {!! Form::open(['url' => "media",'id'=>'media_modal', 'role' => 'form', 'data-toggle' => 'form-ajax', 'data-url' => 'No', 'files' => true]) !!}

                                    <div class="form-group required">
                                        {!! Form::label('title',trans('common.title')) !!}
                                        {!! Form::text('title',null, ['id' => 'title', 'class' =>'form-control', 'required' => 'true']) !!}
                                        <p class="text-danger">{{$errors->first('title')}}</p>
                                    </div>

                                    <div class="form-group required">
                                        {!! Form::label('media',trans('common.media')) !!}
                                        {!! Form::file('media',null, ['id' => 'media', 'class' =>'form-control', 'required' => 'true']) !!}
                                        <p class="text-danger">{{$errors->first('caption')}}</p>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Upload & Import',['class' => 'btn btn-sm btn-primary submit_btn'])!!}
                                        {!! Form::submit('Upload',['class' => 'btn btn-sm btn-primary submit_btn'])!!}
                                    </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        div img{
            width: 200px;
            height: 150px;
            margin:10px 0 10px 0;
        }
    </style>



    <script>
        $(function () {
            // Replace the <textarea id="blog"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('blog');
        });
    </script>


        <script>
            var count_row = 0;

            

            function loadModal(){
                count_row = 0;
                var img_base_path = '{{ asset('poster') }}';
                $.ajax({
                    url: "{{ url('loadMedia') }}",
                    method: 'post',
                    dataType: 'json',
                    data:{
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function (data){
                        var t = $('#dataTables_media').DataTable();
                            t.rows().remove().draw();
                        for(var i = 0; i < data.length; i++){
                            t.row.add( [
                                (i + 1),
                                data[i].title,
                                '<img id="img_'+data[i].id+'" src="'+ img_base_path+ '/' + data[i].path +'" style="height: 80px; width: 100px" class="img-responsive">',
                                '<button class="btn btn-primary btn-sm" onclick="useMedia('+ data[i].id +')">Use</button>',
                            ]).draw();
                            count_row++;
                        }
                        $('#imageUploadModal').modal('show');
                    }
                });
            }

            function useMedia(media_id) {
                $('#imageUploadModal').modal('hide');
                var img_path = $('#img_' + media_id).attr('src');
                // make array
                var array_path= img_path.split('/');
                if(img_path){
                    $( '#importimage' ).addClass( "show" );
                }               
                document.getElementById("importimage").src = img_path;
                $('#image').val(array_path[array_path.length - 1]);
            }


            $('.submit_btn').click(function(e){
                e.preventDefault();
                var formData = new FormData($('#media_modal')[0]);
                var that = this;
                $.ajax({
                    url: "{{ url('media') }}",
                    method: 'post',
                    dataType: 'json',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        var img_base_path = '{{ asset('poster') }}';
                        if(data.success){
                            if($(that).attr('value') == 'Upload & Import') {
                                $('#imageUploadModal').modal('hide');
                                $('#allMediaDiv').click();
                                $('#blog').summernote('editor.insertImage', img_base_path + '/' + data.media_info.path);
                            } else {
                                var t = $('#dataTables_media').DataTable();
                                    t.row.add( [
                                        ++count_row,
                                        data.media_info.title,
                                        '<img id="img_'+data.media_info.id+'" src="'+ img_base_path+ '/' + data.media_info.path +'" style="height: 80px; width: 100px" class="img-responsive">',
                                        '<button class="btn btn-primary btn-sm" onclick="useMedia('+ data.media_info.id +')">Use</button>',
                                    ]).draw();
                                $('#allMediaDiv').click();
                            }
                            $('#title').val('');
                            $('#title').removeClass("focused");
                            $('#media').val('');
                        } else {
                            swal("Something Wrong!!!");
                        }
                    },
                    error: function(){
                        swal("Something Wrong!!!");
                    }
                });
            });

        </script>

@endsection

