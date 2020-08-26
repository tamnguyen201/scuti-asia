@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="ex-basic-1"  style="padding-top: 7rem">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs">
                    <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="row">
                            <div class="col-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
                                    <a class="nav-link" id="v-pills-cv-tab" data-toggle="pill" href="#v-pills-cv" role="tab" aria-controls="v-pills-cv" aria-selected="false">CV</a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                                    <a class="nav-link" href="#settings">Change Infor</a>
                                    <a class="nav-link" href="#settings">Change Password</a>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <h3>Profile personal</h3>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5>Avatar</h5>
                                                <img src="default-img.png" class="img-fluid" alt="">
                                            </div>
                                            <div class="col-md-9">
                                                <h5>Thông tin cá nhân</h5>
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td>@lang('custom.name')</td>
                                                            <td>{{auth()->user()->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('custom.email')</td>
                                                            <td>{{auth()->user()->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('custom.phone')</td>
                                                            <td>{{(auth()->user()->phone) ? auth()->user()->phone : 'null'}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>@lang('custom.address')</td>
                                                            <td>{{(auth()->user()->address) ? auth()->user()->address : 'null'}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-cv" role="tabpanel" aria-labelledby="v-pills-cv-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="th-inner sortable">@lang('custom.stt')</div>
                                                        <div class="fht-cell"></div>
                                                    </th>
                                                    <th>
                                                        <div class="th-inner sortable">@lang('custom.logo')</div>
                                                        <div class="fht-cell"></div>
                                                    </th>
                                                    <th>
                                                        <div class="th-inner sortable text-center">@lang('custom.action')</div>
                                                        <div class="fht-cell"></div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{1}}</td>
                                                    <td>@lang('custom.name')</td>
                                                    <td>{{auth()->user()->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{1}}</td>
                                                    <td>@lang('custom.email')</td>
                                                    <td>{{auth()->user()->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{1}}</td>
                                                    <td>@lang('custom.phone')</td>
                                                    <td>{{(auth()->user()->phone) ? auth()->user()->phone : 'null'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{1}}</td>
                                                    <td>@lang('custom.address')</td>
                                                    <td>{{(auth()->user()->address) ? auth()->user()->address : 'null'}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
