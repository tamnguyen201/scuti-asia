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
                <div class="col-lg-10 offset-lg-1">
                    <div class="image-container-large">
                        <img class="img-fluid" src="images/project-details-large.jpg" alt="alternative">
                    </div>
                    <div class="text-container">
                        <h3>{{$data['job']->name}}</h3>
                        <p>When you first register for a Juno account, and when you use the Services, we collect some <a class="orange" href="#your-link">Personal Information</a> about you such as:</p>
                        <div class="row">
                        {{$data['job']->description}}
                        </div>
                    </div>

                    <a class="btn-outline-reg back" href="{{route('client.applied', [$data['job']->slug, $data['job']->id])}}">@lang('client.section.recruitment.apply')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
