@extends('client.layout.master')
@section('title', trans('client.page.home.title'))
@section('css')
    <style>
        .btn:link,
        .btn:visited {
            text-transform: uppercase;
            text-decoration: none;
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

        /* loading  */
        .col-sm-2 {
            padding: 10px;
            border-radius: 4px;
            height: 125px;
            margin-bottom: 10px;
        }

        .sp {
            width: 32px;
            height: 32px;
            clear: both;
            margin: 20px auto;
        }


        /* Spinner Circle Rotation */
        .sp-circle {
            border: 4px rgba(0, 0, 0, 0.25) solid ;
            border-top: 4px #000 solid ;
            border-radius: 50%;
            -webkit-animation: spCircRot .6s infinite linear;
            animation: spCircRot .6s infinite linear;
        }
        @-webkit-keyframes spCircRot {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(359deg); }
        }
        @keyframes spCircRot {
            from { transform: rotate(0deg); }
            to { transform: rotate(359deg); }
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
                            <div class="card-body px-2">
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
                                    <div class="card p-3 px-md-5">
                                        <img class="card-image img-fluid" src="{{$item->avatar}}" alt="alternative">
                                        <div class="card-body px-0">
                                            <div class="testimonial-author">{{$item->name}}</div>
                                            <div class="testimonial-text">{{$item->position}}</div>
                                            <div class="testimonial-text text-justify">{{$item->quote}}</div>
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
                                    <div class="card p-3 px-md-5">
                                        <img class="card-image img-fluid" src="{{$item->avatar}}" alt="alternative">
                                        <div class="card-body px-0">
                                            <div class="testimonial-author">{{$item->name}}</div>
                                            <div class="testimonial-text">{{$item->position}}</div>
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
                                    <div class="card p-3 px-md-5">
                                        <img class="card-image img-fluid benefits" src="{{$item->image}}" alt="{{$item->name}}">
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
                                                <a class="btn-outline-reg" target="_blank" href="{{$item->url}}">@lang('custom.read_more')</a>
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
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="{{$data['section'][8]->image}}" alt="alternative" style="max-height: 33rem">
                    <p class="py-3">Mr Tomohide Kakeya - CEO & Founder</p>
                </div>
                <div class="col-lg-6">
                    <h3 class="ml-4">@lang('client.section.visit_us.form_title')</h3>
                    <form action="{{route('client.visit_us')}}" id="contactForm" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control-input" name="name" value="{{old('name')}}">
                            <label class="label-control" for="cname">@lang('custom.name') <span class="text-danger">*</span></label>
                            <div class="help-block text-danger with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" name="email" value="{{old('email')}}">
                            <label class="label-control" for="cemail">@lang('custom.email') <span class="text-danger">*</span></label>
                            <div class="help-block text-danger with-errors"></div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="type" checked value="@lang('client.section.visit_us.coffee_with_ceo')">@lang('client.section.visit_us.coffee_with_ceo')
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="type" value="@lang('client.section.visit_us.meeting_with_ceo')">@lang('client.section.visit_us.meeting_with_ceo')
                                    <div class="ml-n3 help-block text-danger with-errors"></div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" cols="10" rows="8" name="message">{{old('message')}}</textarea>
                            <label class="label-control" for="cmessage">@lang('custom.message') <span class="text-danger">*</span></label>
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
                        <a class="button text-decoration-none is-checked" data-filter="*"><span>@lang('client.section.recruitment.all')</span></a>
                        @foreach($data['categories'] as $category)
                        <a class="button text-decoration-none" data-filter="{{$category->id}}"><span>{{$category->category_name}}</span></a>
                        @endforeach
                    </div>
                    <div class="col-md-6 mx-auto mt-3 d-md-flex">
                        <div class="form-group mx-2 w-75">
                            <input type="text" class="form-control" id="input-category" value="*" hidden>
                            <input type="text" class="form-control" id="input-search" placeholder="@lang('custom.placeholder.search')">
                        </div>
                        <div class="form-group mx-2">
                            <button type="submit" id="btn-search" class="btn btn-search text-white" style="background-color: #f83a5e;">@lang('custom.button.search')</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="list-group col-12 list-jobs p-3" style="border-radius: 10px;background-color: #fff;">
                        <div class="row col-lg-12 d-flex">
                            @foreach($data['jobs'] as $job)
                                <div class="d-md-flex col-lg-6 col-12 d-block development">
                                    <div class="col-md-12 list-group-item d-md-flex">
                                        <div class="col-xl-7 col-md-6 col-12">
                                            <div class="mb-block cell name-job">
                                                <h4 class="title-h4"><a style="color: #f4511e;" href="{{route('job-detail', [$job->id, $job->slug])}}" class="text-decoration-none"> {{$job->name}}</a></h4>
                                                <p class="desc-job">
                                                    {{$job->description}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-md-6 d-none d-md-block text-md-right text-center">
                                            <a href="{{route('client.applied', [$job->id, $job->slug])}}" class="btn btn-apply-main btn-apply font-weight-bold">@lang('client.section.recruitment.apply')</a>
                                            <p class="desc-job text-left mt-1">
                                                <i class="far fa-money-bill-alt"></i> @lang('client.section.recruitment.salary'): {{$job->salary}} <br>
                                                <i class="fas fa-map-marker-alt"></i> @lang('client.section.recruitment.work_place'): {{$job->location->name}} <br>
                                                <i class="far fa-clock"></i> @lang('client.section.recruitment.deadline'): {{$job->formatExpireDay()}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end pr-4">
                            <div class="row mr-5">
                                {{$data['jobs']->links()}}
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
                $("#contactForm").trigger("reset");
                $("#contactForm").find("textarea, input").removeClass('notEmpty');
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

        $(window).on('load', function() {
            if(location.search.indexOf('page') > 0){
                location.hash = 'recruitment';
            };
            // filter items on button click
            $('.filters-button-group').on( 'click', 'a', function() {
                $('#input-search').val('');
                var filterValue = $(this).attr('data-filter');
                console.log(filterValue);
                $('#input-category').val(filterValue);

                $(".row.col-lg-12.d-flex").html(`
                <div class="col-sm-2 mx-auto">
                    <div class="sp sp-circle"></div>
                </div>
                `);
                $.ajax({
                    url: "{{route('client.filter_jobs')}}",
                    data: { category_id: filterValue },
                    method: "GET",
                }).done(function (results) {
                    $(".list-group.col-12.list-jobs").html(results);
                }).fail(function (data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                });
            });
            
            // change is-checked class on buttons
            $('.button-group').each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'a', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $( this ).addClass('is-checked');
                });	
            });

        });

        $("#btn-search").on('click', function() {
            let value = $('#input-search').val();
            let keyword = value.trim();
            let category_id = $('#input-category').val();
            $.ajax({
                url: "{{ route('client.jobSearch') }}",
                data: {
                    'keyword': keyword,
                    'category_id': category_id
                },
                method: "POST",
            }).done(function(results) {
                $(".list-group.col-12.list-jobs").html(results);
            });
        });

    </script>
@endsection
