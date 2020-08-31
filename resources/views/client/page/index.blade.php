@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
    @include('client.layout.header')

    <div id="benefits" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.benefit.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.benefit.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                {!! $data['benefits']->content !!}
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="{{$data['benefits']->image}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.working_environment.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.working_environment.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cards-container row">
                        @foreach($data['working_environment'] as $item)
                        <div class="card col-md-6 col-lg-4 px-0">
                            <div class="card-image">
                                <img class="img-fluid" src="{{$item->image_url}}" alt="{{$item->name}}">
                            </div>
                            <div class="card-body">
                                <p>{{$item->name}}</p>
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
                    <h2>@lang('client.section.about_us.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.about_us.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <!-- {!! $data['about_us'] !!} -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{$data['about_us']->image}}" alt="alternative">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-container mt-0">
                        {!! $data['about_us']->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-1 basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.newspaper.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.newspaper.description')</p>
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

    <div id="contact" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.visit_us.title')</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">@lang('client.section.visit_us.description')</li>
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
                        {!! $data['visit_us']->map_url !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{route('client.visit_us')}}" id="contactForm" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cname" required>
                            <label class="label-control" for="cname">@lang('custom.name')</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">@lang('custom.email')</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">Coffee
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="optradio">Trà Đá
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Your message</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">@lang('custom.button.submit')</button>
                        </div>
                        <div class="form-message">
                            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.recruitment_flow.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.recruitment_flow.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                {!! $data['recruitment_flow']->content !!}
            </div>
        </div>
    </div>

	<div id="recruitment" class="filter">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.recruitment.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.recruitment.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-md-flex">
                    <div class="col-lg-3 col-md-4 col-12 button-group filters-button-group">
                        <h3 class="is-checked"><span>@lang('client.section.recruitment.menu_title')</span></h3>
                        @foreach($data['categories'] as $category)
                        <a class="d-block button text-decoration-none" id="v-pills-{{$category->category_name}}-tab" data-toggle="pill" href="#v-pills-{{$category->category_name}}" role="tab" aria-controls="v-pills-{{$category->category_name}}" aria-selected="true"><span>{{$category->category_name}}</span></a>
                        @endforeach
                        <a class="d-block button text-decoration-none" href="{{route('client.jobs')}}"><span>@lang('client.section.recruitment.end_menu')</span></a>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12 list-group">
                        <div class="tab-content" id="v-pills-tabContent">
                        @foreach($data['categories'] as $category)
                            <div class="tab-pane fade" id="v-pills-{{$category->category_name}}" role="tabpanel" aria-labelledby="v-pills-{{$category->category_name}}-tab">
                                @foreach($data['jobs'] as $job)    
                                @if($job->category->id == $category->id)
                                <div class="list-group-item d-md-flex col-12 development">
                                    <div class="col-md-8 col-12">
                                        <div class="mb-block cell name-job">
                                            <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->slug, $job->id])}}">[Đà Nẵng] {{$job->name}}</a></h4>
                                            <span class="desc-job inline"><span class="-ap icon-access_time"></span>07/08 — 31/12/2020 <span class="job-type">Freelancer</span></span>
                                            <p class="desc-job"><span class="-ap icon-coin-dollar"></span>Thỏa thuận</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 text-md-right text-center">
                                        <a href="{{route('client.applied', [$job->slug, $job->id])}}" class="btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            @endforeach

                            <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                                @foreach($data['hotJobs'] as $job)
                                <div class="list-group-item d-md-flex col-12 development">
                                    <div class="col-md-8 col-12">
                                        <div class="mb-block cell name-job">
                                            <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->slug, $job->id])}}">[Đà Nẵng] {{$job->name}}</a></h4>
                                            <span class="desc-job inline"><span class="-ap icon-access_time"></span>07/08 — 31/12/2020 <span class="job-type">Freelancer</span></span>
                                            <p class="desc-job"><span class="-ap icon-coin-dollar"></span>Thỏa thuận</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 text-md-right text-center">
                                        <a href="{{route('client.applied', [$job->slug, $job->id])}}" class="btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
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
@endsection
