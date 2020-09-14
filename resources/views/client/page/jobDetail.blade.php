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

    <div class="ex-basic-2" style="background-color: #eff3f6;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-4 p-0" style="background-color: #fff;">
                    <h2 class="pt-2 px-4 border-bottom">{{$data['job']->name}}</h2>
                    <div class="text-container pt-3 px-4">
                        <div class="">
                        {!! $data['job']->content !!}
                        </div>
                    </div>
                    <a class="btn-outline-reg back ml-4 mb-5" href="{{route('client.applied', [$data['job']->id, $data['job']->slug])}}">@lang('client.section.recruitment.apply')</a>
                </div>
                <div class="col-md-4">
                    <div class="col-lg-12 mb-2 p-0" style="background-color: #fff;">
                        <h3 class="p-2 border-bottom">@lang('client.page.apply.sidebar.title')</h3>
                        <div class="pb-2">
                            <ul class="px-3">
                                <li class="row justify-content-between mx-0 mb-2">
                                    <b>@lang('client.page.apply.sidebar.location')</b>
                                    <div class="value">{{$data['job']->location->name}} </div>
                                </li>
                                <li class="row justify-content-between mx-0 mb-2">
                                    <b>@lang('client.page.apply.sidebar.salary')</b>
                                    <div class="value">{{$data['job']->salary}}</div>
                                </li>
                                <li class="row justify-content-between mx-0 mb-2">
                                    <b>@lang('client.page.apply.sidebar.end_time')</b>
                                    <div class="value">{{$data['job']->formatExpireDay()}}</div>
                                </li>
                            </ul>
                            <div class="form-group px-3">
                                <a href="{{route('client.applied', [$data['job']->id, $data['job']->slug])}}" class="form-control text-center btn-outline-reg mt-0" >@lang('client.section.recruitment.apply')</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2 p-0 pb-3" style="background-color: #fff;">
                        <h3 class="p-2 border-bottom">@lang('client.page.job.related_job')</h3>
                        <div class="col-lg-12 p-0">
                            @foreach($data['related_job'] as $job )
                            <div class="col-md-12 list-group-item mt-2">
                                <div class="col-12 p-0">
                                    <div class="mb-block cell name-job">
                                        <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->id, $job->slug])}}">[{{$job->location->name}}] {{$job->name}}</a></h4>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span><i class="far fa-money-bill-alt"></i> {{$job->salary}} </span>
                                        <span><i class="far fa-clock"></i> {{$job->formatExpireDay()}} </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2 p-0 text-justify">
                                    {{$job->description}}
                                    <!-- <a href="{{route('client.applied', [$job->id, $job->slug])}}" class="form-control text-center btn-outline-reg mt-0">@lang('client.section.recruitment.apply')</a> -->
                                </div>
                            </div>
                            @endforeach
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
