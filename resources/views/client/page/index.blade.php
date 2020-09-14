@extends('client.layout.master')
@section('title', trans('client.page.home.title'))
@section('css')
    <style>
        .text-box {
    margin-left: 44vw;
     margin-top: 42vh;
}

.btn:link,
.btn:visited {
    text-transform: uppercase;
    text-decoration: none;
    color: #000 !important;
    padding: 15px 40px;
    display: inline-block;
    border-radius: 100px;
    transition: all .2s;
}

.btn:hover {
    transform: translateY(-3px);
    color: #fff !important;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}


.btn::after {
    content: "";
    display: inline-block;
    height: 100%;
    width: 100%;
    border-radius: 100px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all .4s;
}


.btn:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}

    </style>
@endsection
@section('content')
    @include('client.layout.header')

    <div id="benefits" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][1]->name}}</h2>
                    <p class="p-heading p-large">{{$data['section'][1]->description}}</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                {!! $data['section'][1]->content !!}
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <img src="{{$data['section'][1]->image}}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][2]->name}}</h2>
                    <p class="p-heading p-large">{{$data['section'][2]->description}}</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cards-container row">
                        @foreach($data['working_environment'] as $item)
                        <div class="card col-md-6 col-lg-4 col-xl-4 px-0">
                            <div class="card-image">
                                <img class="img-fluid" src="{{$item->image_url}}" style="max-width: 320px;max-height:205px" alt="{{$item->name}}">
                            </div>
                            <div class="card-body">
                                <h5>{{$item->name}}</h5>
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][3]->name}}</h2>
                    <p class="p-heading p-large">{{$data['section'][3]->description}}</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{$data['section'][3]->image}}" alt="alternative">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-container mt-0">
                        {!! $data['section'][3]->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][4]->name}}</h2>
                    <hr class="line-heading">
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                @foreach($data['main_member'] as $item)
                                @if($item->member_type == 1)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="{{$item->avatar}}" alt="alternative">
                                        <div class="card-body">
                                            <div class="testimonial-author">{{$item->name}}</div>
                                            <div class="testimonial-text">{{$item->position}}</div>
                                            <div class="testimonial-text">{{$item->quote}}</div>
                                        </div>
                                    </div>
                                </div> 
                                @endif
                                @endforeach
                            </div>
        
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-2 background-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][5]->name}}</h2>
                    <hr class="line-heading">
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                            @foreach($data['main_member'] as $item)
                                @if($item->member_type == 0)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="{{$item->avatar}}" alt="alternative">
                                        <div class="card-body">
                                            <div class="testimonial-author">{{$item->name}}</div>
                                            <div class="testimonial-text">{{$item->position}}</div>
                                            <div class="testimonial-text">{{$item->quote}}</div>
                                        </div>
                                    </div>
                                </div> 
                                @endif
                                @endforeach
                            </div>
        
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][6]->name}}</h2>
                    <hr class="line-heading">
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                @foreach($data['benefits'] as $item)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image benefits" src="{{$item->image}}" alt="{{$item->name}}">
                                        <div class="card-body">
                                            <div class="testimonial-author">{{$item->name}}</div>
                                            <div class="testimonial-text">{{$item->description}}</div>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                            </div>
        
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-1 basic-2 background-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][7]->name}}</h2>
                    <p class="p-heading p-large">{{$data['section'][7]->description}}</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">      
                    <div class="slider-container">
                        <div class="swiper-container text-slider">
                            <div class="swiper-wrapper">
                                @foreach($data['new_spaper'] as $item )
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="image-container">
                                                <img class="img-fluid" src="{{$item->image}}" alt="alternative">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text-container">
                                                <h3>{{$item->title}}</h3>
                                                <p>{{$item->description}}</p>
                                                <a class="btn-outline-reg" target="_blank" href="{{$item->url}}">DETAILS</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="form-2 background-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][8]->name}}</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">{{$data['section'][8]->description}}</li>
                        <li><i class="fas fa-map-marker-alt"></i>  {{ $data_share->address }} </li>
                        <li><i class="fas fa-phone"></i><a class="orange" href="tel:{{ $data_share->phone }} ">{{ $data_share->phone }} </a></li>
                        <li><i class="fas fa-envelope"></i><a class="orange" href="mailto:{{ $data_share->email }} ">{{ $data_share->email }} </a></li>
                    </ul>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="map-responsive">
                        <img class="img-fluid" src="{{$data['section'][8]->image}}" alt="alternative">
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{route('client.visit_us')}}" id="contactForm" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control-input" name="name">
                            <label class="label-control" for="cname">@lang('custom.name')</label>
                            <div class="help-block text-danger with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" name="email">
                            <label class="label-control" for="cemail">@lang('custom.email')</label>
                            <div class="help-block text-danger with-errors"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="type" value="coffe">Coffee
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="type" value="trà đá">Trà Đá
                                    <div class="ml-n3 help-block text-danger with-errors"></div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" name="message"></textarea>
                            <label class="label-control" for="cmessage">@lang('custom.message')</label>
                            <div class="help-block text-danger with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">@lang('custom.button.submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="recruitment-flow" class="basic-2 background-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][9]->name}}</h2>
                    <p class="p-heading p-large">{{$data['section'][9]->description}}</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                {!! $data['section'][9]->content !!}
            </div>
        </div>
    </div>

	<div id="recruitment" class="filter background-dark">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{$data['section'][10]->name}}</h2>
                    <p class="p-heading p-large">{{$data['section'][10]->description}}</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-11 mx-auto mb-4">
                    <div class="button-group filters-button-group">
                        <a class="button text-decoration-none is-checked" id="v-pills-all" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true" data-filter="*"><span>SHOW ALL</span></a>
                        @foreach($data['categories'] as $category)
                        <a class="button text-decoration-none" id="v-pills-{{$category->id}}-tab" data-toggle="pill" href="#v-pills-{{$category->id}}" role="tab" aria-controls="v-pills-{{$category->id}}" aria-selected="true"><span>{{$category->category_name}}</span></a>
                        @endforeach
                        <a class="button text-decoration-none" href="{{route('client.jobs')}}"><span>@lang('client.section.recruitment.end_menu')</span></a>
                    </div>
                </div>
                <div class="col-lg-12 d-md-flex">
                    <div class="list-group">
                        <div class="tab-content" id="v-pills-tabContent">
                        @foreach($data['categories'] as $category)
                            <div class="tab-pane fade" id="v-pills-{{$category->id}}" role="tabpanel" aria-labelledby="v-pills-{{$category->id}}-tab">
                            @if($category->jobs->count() > 0)
                                @foreach($category->jobs as $job)    
                                    @if($job->status == 1)
                                    <div class="d-md-flex col-6 development">
                                        <div class="col-md-12 list-group-item d-flex">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-block cell name-job">
                                                    <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->id, $job->slug])}}"> {{$job->name}}</a></h4>
                                                    <p class="desc-job">
                                                        {{$job->description}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 text-md-right text-center">
                                                <a href="{{route('client.applied', [$job->id, $job->slug])}}" class="btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
                                                <p class="desc-job text-left mt-3">
                                                    <i class="far fa-money-bill-alt"></i> Lương: {{$job->salary}} <br>
                                                    <i class="fas fa-map-marker-alt"></i> Nơi làm việc: {{$job->location->name}} <br>
                                                    <i class="far fa-clock"></i> Ngày hết hạn: {{$job->formatExpireDay()}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                <p>@lang('client.section.recruitment.empty')</p>
                            @endif
                            </div>
                            @endforeach

                            <div class="tab-pane fade row col-lg-12 d-flex show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                                @foreach($data['hotJobs'] as $job)
                                <div class="d-md-flex col-6 development">
                                    <div class="col-md-12 list-group-item d-flex">
                                        <div class="col-md-7 col-12">
                                            <div class="mb-block cell name-job">
                                                <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->id, $job->slug])}}"> {{$job->name}}</a></h4>
                                                <p class="desc-job">
                                                    {{$job->description}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12 text-md-right text-center">
                                            <a href="{{route('client.applied', [$job->id, $job->slug])}}" class="btn btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
                                            <p class="desc-job text-left mt-3">
                                                <i class="far fa-money-bill-alt"></i> Lương: {{$job->salary}} <br>
                                                <i class="fas fa-map-marker-alt"></i> Nơi làm việc: {{$job->location->name}} <br>
                                                <i class="far fa-clock"></i> Hạn nộp: {{$job->formatExpireDay()}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>
@endsection
@section('script')
    <script src="clientAsset/js/swiper.min.js"></script> 
    <!-- <script src="https://inovatik.com/juno-landing-page/js/jquery.magnific-popup.js"></script>  -->
    <script src="common/js/isotope.pkgd.min.js"></script>
    <script src="https://inovatik.com/juno-landing-page/js/validator.min.js"></script>
    <script src="clientAsset/js/scripts.js"></script>
    <script>
        $("#contactForm").on("submit", function(event) {
            event.preventDefault();
            let domForm = $(this);
            let url = $(this).attr('action');
            $.ajax({
                url: url,
                data: domForm.serialize(),
                method: "POST",
            }).done(function (results) {
                $('.text-danger.with-errors').text('');
                swal({
                    title: "{{trans('custom.alert_messages.contact_alert.title')}}",
                    text: "{{trans('custom.alert_messages.contact_alert.text')}}",
                    type: 'success',
                    icon: 'success'
                })
            }).fail(function (data) {
                var errors = data.responseJSON;
                $('.text-danger.with-errors').text('');
                $.each(errors.errors, function (i, val) {
                    domForm.find('input[name=' + i + ']').siblings('.text-danger.with-errors').text(val[0]);
                    domForm.find('textarea[name=' + i + ']').siblings('.text-danger.with-errors').text(val[0]);
                });
            });
        });

    </script>
@endsection
