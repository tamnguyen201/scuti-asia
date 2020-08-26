@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')

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

                        <a class="d-block button text-decoration-none"  id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true"><span>DESIGN</span></a>
                        <a class="d-block button text-decoration-none"><span>DEVELOPMENT</span></a>
                        
                        <a class="d-block button text-decoration-none" href=""><span>@lang('client.section.recruitment.end_menu')</span></a>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12 list-group">
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                
                                <div class="list-group-item d-md-flex col-12 development">
                                    <div class="col-md-8 col-12">
                                        <div class="mb-block cell name-job">
                                            <h4 class="title-h4"><a style="font-weight: normal;color: #f4511e; text-decoration: none" href="#">[Đà Nẵng] CTV - Account Manager</a></h4>
                                            <span class="desc-job inline"><span class="-ap icon-access_time"></span>07/08 — 31/12/2020 <span class="job-type">Freelancer</span></span>
                                            <p class="desc-job"><span class="-ap icon-coin-dollar"></span>Thỏa thuận</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12 text-md-right text-center">
                                        <a href="http://tuyendung.luxstay.com/job/hoi-anda-latda-nang-ctv-account-manager-20488?apply=1" class="btn-apply-main btn-apply">Ứng tuyển</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
		</div>
    </div>
@endsection
