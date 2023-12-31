<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @php $ol_cnt=0; @endphp
        @foreach($slides as $slide)
            <li data-target="#carouselExampleCaptions" data-slide-to="{{$ol_cnt}}" class="@if($ol_cnt++==0)active @endif"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @php $cnt=0; @endphp
        @foreach($slides as $slide)
            @php $content = json_decode($slide->content) @endphp
            <div class="carousel-item @if($cnt++==0)active @endif">
                @if($slide->bg_image != null)
                    <img class="d-block w-100" src="{{asset('storage/uploads/'.$slide->bg_image)}}" />
                @elseif($slide->bg_video != null)
                    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                        <source src="{{asset('storage/uploads/'.$slide->bg_video)}}" type="video/mp4">
                    </video>
                @endif

                <div class="carousel-caption d-none d-md-block">
                    @if($content->sub_text)
                    <h5>{{$content->sub_text}}</h5>
                    @endif
                    @if($content->hero_text)
                        <h5>{{$content->hero_text}}</h5>
                    @endif

                    @if(isset($content->buttons))
                        <div class="layer-1-4">
                            <div class="about-btn text-center">
                                @foreach($content->buttons as $button)
                                    <div class="genius-btn text-center text-uppercase ul-li-block bold-font">
                                        <a href="{{$button->link}}" class="btn btn-primary btn-lg mb-15">{{$button->label}}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        @endforeach
{{--        <div class="carousel-item active">--}}
{{--            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
{{--                <source src="{{asset("assets_new/images/video.mp4")}}" type="video/mp4">--}}
{{--            </video>--}}
{{--            <div class="carousel-caption d-none d-md-block">--}}
{{--                <h5>Interactive <span>Photography Courses</span><br /> from the Professionals</h5>--}}
{{--                <a href="{{route('courses.all')}}" class="btn btn-primary btn-lg mb-15">Explore Courses</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img class="d-block w-100" src="{{asset("assets_new/images/slider-1.jpg")}}" />--}}
{{--            <div class="carousel-caption d-none d-md-block">--}}
{{--                <h5>Interactive <span>Photography Courses</span><br /> from the Professionals</h5>--}}
{{--                <a href="{{route('courses.all')}}" class="btn btn-primary btn-lg mb-15">Explore Courses</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img class="d-block w-100" src="{{asset("assets_new/images/slider-1.jpg")}}" />--}}
{{--            <div class="carousel-caption d-none d-md-block">--}}
{{--                <h5>Interactive <span>Photography Courses</span><br /> from the Professionals</h5>--}}
{{--                <a href="{{route('courses.all')}}" class="btn btn-primary btn-lg mb-15">Explore Courses</a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section>
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <ul class="features clearfix">
                    <li>
                        <img src="{{asset("assets_new/images/trending-courses.jpg")}}" alt="Images goes here" />
                        <div class="title clearfix">Trending Courses</div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry. standard dummy text ever since</p>
                    </li>
                    <li>
                        <img src="{{asset("assets_new/images/workshops.jpg")}}" alt="Images goes here" />
                        <div class="title clearfix">Workshops</div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry. standard dummy text ever since</p>
                    </li>
                    <li>
                        <img src="{{asset("assets_new/images/portfolio.jpg")}}" alt="Images goes here" />
                        <div class="title clearfix">Portfolio Reviews</div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry. standard dummy text ever since</p>
                    </li>
                    <li>
                        <img src="{{asset("assets_new/images/instructors.jpg")}}" alt="Images goes here" />
                        <div class="title clearfix">Instructors</div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry. standard dummy text ever since</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>