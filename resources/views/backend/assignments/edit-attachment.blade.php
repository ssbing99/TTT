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

    {!! Form::model($attachment, ['method' => 'POST', 'route' => ['admin.assignments.attachment.update', [$assignment->id, 'group_id' => $group_id, $attachment->id]], 'files' => true,]) !!}
    {!! Form::hidden('model_id',0,['id'=>'assignment_id']) !!}

    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0">Edit Attachment</h3>
            <div class="float-right">
                <a href="{{ route('admin.assignments.attachment.list', ['assignment_id'=>$assignment->id, 'group_id' => $group_id]) }}"
                   class="btn btn-success">View Rearrangement</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('title', trans('labels.backend.lessons.fields.title'), ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.lessons.fields.title')]) !!}
                </div>
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('meta_title','Meta Data', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_title', old('meta_title'), ['class' => 'form-control', 'placeholder' => 'Meta Data']) !!}

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('vimeo_id', 'Vimeo Video ID', ['class' => 'control-label']) !!}
                    {!! Form::text('vimeo_id', old('vimeo_id'), ['class' => 'form-control', 'placeholder' => 'Vimeo Video ID']) !!}
                </div>
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('youtube_id', 'Youtube Video ID', ['class' => 'control-label']) !!}
                    {!! Form::text('youtube_id', old('youtube_id'), ['class' => 'form-control', 'placeholder' => 'Youtube Video ID']) !!}
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
                    {!! Form::label('full_text', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('full_text', old('full_text'), ['class' => 'form-control editor', 'placeholder' => '','id' => 'editor']) !!}

                </div>
            </div>

            <div class="row clearfix">
                @if(isset($attachment->media) && !$attachment->media->isEmpty())
                    @foreach($attachment->media as $_media)
                        @if($_media->type == 'upload')
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 form-group">
                                <label>Uploaded Video
                                    <a href="{{$_media->url}}" target="_blank"><img src="{{asset('assets_new/images/play-button.png')}}" alt="" width="100"/></a>
                                </label>
                            </div>
                        @elseif(str_contains($_media->type,'image'))
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 form-group">
                                <label>Uploaded File
                                    <img src="{{ asset('storage/uploads/'.$_media->name) }}" alt="" width="100"/>
                                </label>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

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

        // var uploadField = $('input[type="file"]');

        // $(document).on('change', 'input[name="attachment_file"]', function () {
        //     var $this = $(this);
        //     $(this.files).each(function (key, value) {
        //         if (value.size > 5000000) {
        //             alert('"' + value.name + '"' + 'exceeds limit of maximum file upload size')
        //             $this.val("");
        //         }
        //     })
        // });


    </script>

@endpush