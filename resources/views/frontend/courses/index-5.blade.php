@extends('frontend.layouts.app'.config('theme_layout'))
@section('title', trans('labels.frontend.course.courses').' | '. app_name() )

@push('after-styles')
    <style>
        .couse-pagination li.active {
            color: #333333 !important;
            font-weight: 700;
        }

        .ul-li ul li {
            list-style: none;
            display: inline-block;
        }

        .couse-pagination li {
            font-size: 18px;
            color: #bababa;
            margin: 0 5px;
        }

        .disabled {
            cursor: not-allowed;
            pointer-events: none;
            opacity: 0.6;
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #c7c7c7;
            background-color: white;
            border: none;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #333333;
            background-color: white;
            border: none;

        }
     .listing-filter-form select{
            height:50px!important;
        }

        ul.pagination {
            display: inline;
            text-align: center;
        }
    </style>
@endpush
@section('content')

    <!-- Start of breadcrumb section
        ============================================= -->
    <div class="banner custom-banner-bg">
        <div class="container">
            <div class="page-heading">
                <span>@if(isset($category)) {{$category->name}} @else @lang('labels.frontend.course.courses') @endif </span>
            </div>
        </div>
    </div>
    <!-- End of breadcrumb section
        ============================================= -->


    <!-- Start of course section
        ============================================= -->
    <section>
        <div class="container">
            <div class="row clearfix">
                <div class="col-12 col-sm-8 col-md-9 col-lg-9 col-xl-9">
                    @if(session()->has('success'))
                        <div class="alert alert-dismissable alert-success fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="page-title clearfix">
                        <div class="row clearfix">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <label class="title">@lang('labels.frontend.course.sort_by')
                                    <select id="sortBy" class="form-control" style="margin-left: 10px;">
                                        <option value="">@lang('labels.frontend.course.none')</option>
                                        <option value="popular">@lang('labels.frontend.course.popular')</option>
                                        <option value="trending">@lang('labels.frontend.course.trending')</option>
                                        <option value="featured">@lang('labels.frontend.course.featured')</option>
                                        <option value="past">Past</option>
                                        <option value="future">Future</option>
                                    </select>
                                </label>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="float-right">
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary" id="list">
                                            <i class="fa fa-list"></i>
                                        </button>
                                        <button class="btn btn-outline-secondary" id="grid">
                                            <i class="fa fa-th-large"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="products" class="row view-group">

                        @if($courses->count() > 0)

                            @foreach($courses as $course)
                                <div class="item col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="coursegrid clearfix">
                                        <img src="{{asset('storage/uploads/'.$course->course_image)}}" alt="" />
                                        <div class="price">
                                            @if($course->free == 1)
                                                {{trans('labels.backend.courses.fields.free')}}
                                            @else
                                                {{$appCurrency['symbol'].' '.$course->price}}
                                            @endif
                                        </div>
                                        <h6><a href="{{ route('courses.show', [$course->slug]) }}">{{$course->title}}</a></h6>
                                        <p>{{substr($course->description, 0,200).'...'}}</p>
                                        <div class="row clearfix">
                                            <div class="col-8 col-sm-7 col-md-7 col-lg-8 col-xl-8">
                                                @foreach($course->teachers as $teacher)
                                                <div class="user-img">
                                                    <img src="{{$teacher->picture}}" alt="Image goes here" />
                                                    <p class="username">By <span><a href="#">{{$teacher->first_name}}</a></span></p>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <ul class="subicons" style="float: left;">
                                                    <li><i class="fa fa-users"></i> {{ $course->students()->count() }}</li>
                                                    <li><i class="fa fa-commenting-o"></i> {{count($course->reviews) }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @else
                            <h3>@lang('labels.general.no_data_available')</h3>
                        @endif


                    </div>
                        <div class="couse-pagination text-center ul-li">
                            {{ $courses->links() }}
                        </div>
                </div>

                <!-- Start of sidebar section
                    ============================================= -->

                @include('frontend.layouts.partials.browse-course-sidebar')

                <!-- End of sidebar section
                    ============================================= -->
            </div>
        </div>
    </section>

    <!-- End of course section
        ============================================= -->

    <!-- Start of best course
   =============================================  -->
    @include('frontend.layouts.partials.browse_courses2')
    <!-- End of best course
            ============================================= -->


@endsection

@push('after-scripts')
    <script>
        $(document).ready(function () {

            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});

            $(document).on('change', '#sortBy', function () {
                if ($(this).val() != "") {
                    location.href = '{{url()->current()}}?type=' + $(this).val();
                } else {
                    location.href = '{{route('courses.all')}}';
                }
            })

            @if(request('type') != "")
            $('#sortBy').find('option[value="' + "{{request('type')}}" + '"]').attr('selected', true);
            @endif
        });

    </script>
@endpush