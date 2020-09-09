@extends('client.layout.master')
@section('title', trans('client.page.job.title'))
@section('content')
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="{{route('home')}}">@lang('client.page.home.title')</a><i class="fa fa-angle-double-right"></i><a href="{{route('client.jobs')}}">@lang('client.page.job.title')</a><i class="fa fa-angle-double-right"></i><span>{{$data['job']->name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="text-container">
                        <h2>{{$data['job']->name}}</h2>
                        <div class="">
                        {!! $data['job']->description !!}
                        </div>
                    </div>

                    <a class="btn-outline-reg back" href="{{route('client.applied', [$data['job']->slug, $data['job']->id])}}">@lang('client.section.recruitment.apply')</a>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h4>@lang('client.page.apply.sidebar.title')</h4>
                    <ul class="pl-0">
                        <li class="row justify-content-between mx-0 mb-2">
                            <b>@lang('client.page.apply.sidebar.level')</b>
                            <div class="value">Nhân viên</div>
                        </li>
                        <li class="row justify-content-between mx-0 mb-2">
                            <b>@lang('client.page.apply.sidebar.job')</b>
                            <div class="value">Tự động hóa</div>
                        </li>
                        <li class="row justify-content-between mx-0 mb-2">
                            <b>@lang('client.page.apply.sidebar.exp')</b>
                            <div class="value">2 - 10 Năm</div>
                        </li>
                        <li class="row justify-content-between mx-0 mb-2">
                            <b>@lang('client.page.apply.sidebar.salary')</b>
                            <div class="value">Cạnh tranh</div>
                        </li>
                        <li class="row justify-content-between mx-0 mb-2">
                            <b>@lang('client.page.apply.sidebar.work_place')</b>
                            <div class="value">Bình Dương </div>
                        </li>
                        <li class="row justify-content-between mx-0 mb-2">
                            <b>@lang('client.page.apply.sidebar.end_time')</b>
                            <div class="value">30/09/2020</div>
                        </li>
                    </ul>
                    <div class="form-group">
                        <a href="{{route('client.applied', [$data['job']->slug, $data['job']->id])}}" class="form-control text-center btn-outline-reg" >@lang('client.section.recruitment.apply')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-1 basic-2 filter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.page.job.related_job')</h2>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">      
                    <div class="slider-container">
                        <div class="swiper-container text-slider">
                            <div class="swiper-wrapper">
                                @foreach($data['related_job'] as $job )
                                <div class="swiper-slide">
                                    <div class="list-group-item d-md-flex col-10 mx-auto development">
                                        <div class="col-md-8 col-12">
                                            <div class="mb-block cell name-job">
                                                <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->slug, $job->id])}}">[Đà Nẵng] {{$job->name}}</a></h4>
                                                <span class="desc-job inline"><span class="-ap icon-access_time"></span>07/08 — 31/12/2020 <span class="job-type">Freelancer</span></span>
                                                <p class="desc-job"><span class="-ap icon-coin-dollar"></span>Thỏa thuận</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12 text-md-right text-center mt-3">
                                            <a href="{{route('client.applied', [$job->slug, $job->id])}}" class="btn-apply-main btn-apply">@lang('client.section.recruitment.apply')</a>
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
@endsection
@section('script')
    <script src="clientAsset/js/swiper.min.js"></script> 
    <script src="clientAsset/js/scripts.js"></script>
@endsection
