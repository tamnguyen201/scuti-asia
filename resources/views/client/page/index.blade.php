@extends('client.layout.master')
@section('title', trans('client.page.home.title'))
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
                                <img class="img-fluid" src="{{$item->image_url}}" style="max-width: 320px;max-height:205px" alt="{{$item->name}}">
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
                            <label class="label-control" for="cmessage">Your message</label>
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
                <div class="col-lg-11 mx-auto">
                    <div class="button-group filters-button-group">
                        <a class="button is-checked" data-filter="*"><span>SHOW ALL</span></a>
                        <a class="button" data-filter=".design"><span>DESIGN</span></a>
                        <a class="button" data-filter=".development"><span>DEVELOPMENT</span></a>
                        <a class="button" data-filter=".marketing"><span>MARKETING</span></a>
                        <a class="button" data-filter=".seo"><span>SEO</span></a>
                        <a class="button is-checked" data-filter="*"><span>SHOW ALL</span></a>
                        <a class="button" data-filter=".design"><span>DESIGN</span></a>
                        <a class="button" data-filter=".development"><span>DEVELOPMENT</span></a>
                        <a class="button" data-filter=".marketing"><span>MARKETING</span></a>
                        <a class="button" data-filter=".seo"><span>SEO</span></a>
                        <a class="button is-checked" data-filter="*"><span>SHOW ALL</span></a>
                        <a class="button" data-filter=".design"><span>DESIGN</span></a>
                        <a class="button" data-filter=".development"><span>DEVELOPMENT</span></a>
                        <a class="button" data-filter=".marketing"><span>MARKETING</span></a>
                        <a class="button" data-filter=".seo"><span>SEO</span></a>
                    </div>
                </div>
                <div class="col-lg-12 d-md-flex">
                    <div class="col-lg-3 col-md-4 col-12 button-group filters-button-group">
                        <h3 class="is-checked"><span>@lang('client.section.recruitment.menu_title')</span></h3>
                        @foreach($data['categories'] as $category)
                        <a class="d-block button text-decoration-none" id="v-pills-{{$category->slug}}-tab" data-toggle="pill" href="#v-pills-{{$category->slug}}" role="tab" aria-controls="v-pills-{{$category->slug}}" aria-selected="true"><span>{{$category->category_name}}</span></a>
                        @endforeach
                        <a class="d-block button text-decoration-none" href="{{route('client.jobs')}}"><span>@lang('client.section.recruitment.end_menu')</span></a>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12 list-group">
                        <div class="tab-content" id="v-pills-tabContent">
                        @foreach($data['categories'] as $category)
                            <div class="tab-pane fade" id="v-pills-{{$category->slug}}" role="tabpanel" aria-labelledby="v-pills-{{$category->slug}}-tab">
                                @foreach($data['jobs'] as $job)    
                                @if($job->category->id == $category->id)
                                <div class="list-group-item d-md-flex col-12 development">
                                    <div class="col-md-8 col-12">
                                        <div class="mb-block cell name-job">
                                            <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->id, $job->slug])}}">[{{$job->location->name}}] {{$job->name}}</a></h4>
                                            <p class="desc-job">
                                                <i class="far fa-money-bill-alt"></i> {{$job->salary}} <br>
                                                <i class="fas fa-map-marker-alt"></i> {{$job->location->name}}
                                            </p>
                                            <span class="desc-job inline"><i class="far fa-clock"></i> {{$job->formatExpireDay()}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 text-md-right text-center">
                                        <a href="{{route('client.applied', [$job->id, $job->slug])}}" class="btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
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
                                            <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->id, $job->slug])}}">[{{$job->location->name}}] {{$job->name}}</a></h4>
                                            <p class="desc-job">
                                                <i class="far fa-money-bill-alt"></i> {{$job->salary}} <br>
                                                <i class="fas fa-map-marker-alt"></i> {{$job->location->name}}
                                            </p>
                                            <span class="desc-job inline"><i class="far fa-clock"></i> {{$job->formatExpireDay()}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 text-md-right text-center">
                                        <a href="{{route('client.applied', [$job->id, $job->slug])}}" class="btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
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
