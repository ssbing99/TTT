@extends('backend.layouts.app')
@section('title', 'Attachment | '.app_name())

@push('after-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <style>
        .select2-container--default .select2-selection--single {
            height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }

        .bootstrap-tagsinput {
            width: 100% !important;
            display: inline-block;
        }

        .bootstrap-tagsinput .tag {
            line-height: 1;
            margin-right: 2px;
            background-color: #2f353a;
            color: white;
            padding: 3px;
            border-radius: 3px;
        }

    </style>

@endpush

@section('content')

    {!! Form::open(['method' => 'POST', 'route' => ['admin.assignments.attachment.create',['assignment_id'=>$assignment_id, 'group_id'=> $group_id]], 'files' => true,]) !!}
    {!! Form::hidden('model_id',0,['id'=>'assignment_id']) !!}

    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0">Create Attachment</h3>
            <div class="float-right">
                <a href="{{ route('admin.assignments.attachment.list', ['assignment_id'=>$assignment_id, 'group_id' => $group_id]) }}"
                   class="btn btn-success">View Rearrangement</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('title_attach', trans('labels.backend.lessons.fields.title'), ['class' => 'control-label']) !!}
                    {!! Form::text('title_attach', old('title_attach'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.lessons.fields.title')]) !!}
                </div>
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('metaData','Meta Data', ['class' => 'control-label']) !!}
                    {!! Form::text('metaData', old('metaData'), ['class' => 'form-control', 'placeholder' => 'Meta Data']) !!}

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('vimeoVideo', 'Vimeo Video ID', ['class' => 'control-label']) !!}
                    {!! Form::text('vimeoVideo', old('vimeoVideo'), ['class' => 'form-control', 'placeholder' => 'Vimeo Video ID']) !!}
                </div>
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('youtubeVideo', 'Youtube Video ID', ['class' => 'control-label']) !!}
                    {!! Form::text('youtubeVideo', old('youtubeVideo'), ['class' => 'form-control', 'placeholder' => 'Youtube Video ID']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('position', 'Position', ['class' => 'control-label']) !!}
                    {!! Form::text('position', old('position'), ['class' => 'form-control', 'placeholder' => 'Position']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-12 form-group">
                    {!! Form::label('description_attach', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_attach', old('description_attach'), ['class' => 'form-control editor', 'placeholder' => '','id' => 'editor']) !!}

                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-12 form-group">--}}
{{--                    {!! Form::label('downloadable_files', trans('labels.backend.lessons.fields.downloadable_files').' '.trans('labels.backend.lessons.max_file_size'), ['class' => 'control-label']) !!}--}}
{{--                    {!! Form::file('downloadable_files[]', [--}}
{{--                        'multiple',--}}
{{--                        'class' => 'form-control file-upload',--}}
{{--                        'id' => 'downloadable_files',--}}
{{--                        'accept' => "image/jpeg,image/gif,image/png,application/msword,audio/mpeg,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-powerpoint,application/pdf,video/mp4"--}}
{{--                        ]) !!}--}}
{{--                    <div class="photo-block">--}}
{{--                        <div class="files-list"></div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-12 form-group">
                    {!! Form::label('video_file', 'Upload a Video', ['class' => 'control-label']) !!}
                    {!! Form::file('video_file', [
                        'class' => 'form-control file-upload',
                         'id' => 'video_file',
                        'accept' => "video/avi,video/mpeg,video/quicktime,video/mp4"
                        ]) !!}
                    <small class="text-muted">*Video must not more than 5 MB. Only accept MP4, MPEG, AVI type.</small>
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    {!! Form::label('attachment_file', 'Upload a File', ['class' => 'control-label']) !!}
                    {!! Form::file('attachment_file', [
                        'class' => 'form-control file-upload',
                         'id' => 'attachment_file',
                        'accept' => "image/jpeg"
                        ]) !!}
                    <small class="text-muted">*Photos must be more than 500 px. on both horizontal and vertical dimensions. Only JPEG photo type</small>
                </div>
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-12 form-group">--}}
{{--                    {!! Form::label('audio_files', trans('labels.backend.lessons.fields.add_audio'), ['class' => 'control-label']) !!}--}}
{{--                    {!! Form::file('add_audio', [--}}
{{--                        'class' => 'form-control file-upload',--}}
{{--                         'id' => 'add_audio',--}}
{{--                        'accept' => "audio/mpeg3"--}}

{{--                        ]) !!}--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="row">

                <div class="col-12  text-left form-group">
                    {!! Form::submit(trans('strings.backend.general.app_save'), ['class' => 'btn  btn-danger']) !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}



@stop

@push('after-scripts')
    <script src="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        $('.editor').each(function () {

            CKEDITOR.replace($(this).attr('id'), {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
                extraPlugins: 'smiley,lineutils,widget,codesnippet,prism,flash',
            });

        });

        var uploadField = $('input[type="file"]');

        $(document).on('change', 'input[name="video_file"]', function () {
            var $this = $(this);
            $(this.files).each(function (key, value) {
                if (value.size > 5000000) {
                    alert('"' + value.name + '"' + 'exceeds limit of maximum file upload size')
                    $this.val("");
                }
            })
        });
        $(document).on('change', 'input[name="attachment_file"]', function () {
            var $this = $(this);
            $(this.files).each(function (key, value) {
                if (value.size > 5000000) {
                    alert('"' + value.name + '"' + 'exceeds limit of maximum file upload size')
                    $this.val("");
                }
            })
        });


    </script>

@endpush