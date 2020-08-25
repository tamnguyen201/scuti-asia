@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('css')
    <style>
        .tab-content{
  background: #fdfdfd;nav > .nav.nav-tabs{

  border: none;
    color:#fff;
    background:#272e38;
    border-radius:0;

}
nav > .nav.nav-tabs{

border: none;
  color:#fff;
  background:#272e38;
  border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
border: none;
  padding: 18px 25px;
  color:#fff;
  background:#272e38;
  border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
{
content: "";
position: relative;
bottom: -60px;
left: -10%;
border: 15px solid transparent;
border-top-color: #e74c3c ;
}
.tab-content{
background: #fdfdfd;
  line-height: 25px;
  border: 1px solid #ddd;
  border-top:5px solid #e74c3c;
  border-bottom:5px solid #e74c3c;
  padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
border: none;
  background: #e74c3c;
  color:#fff;
  border-radius:0;
  transition:background 0.20s linear;
}
    </style>
@endsection
@section('content')
<div class="ex-basic-1"  style="padding-top: 10rem">
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
                <div class="col-lg-10 offset-lg-1">
                    <div class="text-container">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile personal</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
                        </div>
                    </nav>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                        </div>
                        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
