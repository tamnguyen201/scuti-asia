@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')

	<div class="filter" style="padding-top: 8rem">
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
                        <h3 class=""><span>@lang('client.section.recruitment.menu_title')</span></h3>
                        @foreach($data['categories'] as $category)
                        <a class="d-block button text-decoration-none" id="v-pills-{{$category->category_name}}-tab" data-toggle="pill" href="#v-pills-{{$category->category_name}}" role="tab" aria-controls="v-pills-{{$category->category_name}}" aria-selected="true"><span>{{$category->category_name}}</span></a>
                        @endforeach
                        <a class="d-block button is-checked text-decoration-none" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true"><span>@lang('client.section.recruitment.end_menu')</span></a>
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
                                        <a href="" class="btn-apply-main btn-apply">Ứng tuyển</a>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            @endforeach

                            <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                                @foreach($data['jobs'] as $job)
                                <div class="list-group-item d-md-flex col-12 development">
                                    <div class="col-md-8 col-12">
                                        <div class="mb-block cell name-job">
                                            <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="{{route('job-detail', [$job->slug, $job->id])}}">[Đà Nẵng] {{$job->name}}</a></h4>
                                            <span class="desc-job inline"><span class="-ap icon-access_time"></span>07/08 — 31/12/2020 <span class="job-type">Freelancer</span></span>
                                            <p class="desc-job"><span class="-ap icon-coin-dollar"></span>Thỏa thuận</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 text-md-right text-center">
                                        <a href="" class="btn-apply-main btn-apply">Ứng tuyển</a>
                                    </div>
                                </div>
                                @endforeach
                                <div class="row my-3 offset-lg-4 offset-md-3 offset-1">
                                    {{$data['jobs']->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>

    <div class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>@lang('client.section.recruitment_flow.title')</h2>
                    <p class="p-heading p-large">@lang('client.section.recruitment_flow.description')</p>
                    <hr class="line-heading">
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="clientAsset/js/swiper.min.js"></script> 
    <!-- <script src="https://inovatik.com/juno-landing-page/js/jquery.magnific-popup.js"></script>  -->
    <script src="https://inovatik.com/juno-landing-page/js/isotope.pkgd.min.js"></script>
    <script src="https://inovatik.com/juno-landing-page/js/validator.min.js"></script>
    <script src="clientAsset/js/scripts.js"></script>
@endsection
