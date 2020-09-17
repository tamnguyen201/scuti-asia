@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('css')
    <style>
        .nav-pills .nav-link.active {
            background-color: #e74c3c;
        }

        nav > .nav.nav-tabs{

border: none;
  color:#fff;
  background:#272e38;
  border-radius:0;

}
nav > div a.nav-item.nav-link
{
    border: none;
    padding: 18px 25px;
    color:#fff;
    background:#272e38;
    border-radius:0;
}
nav > div a.nav-item.nav-link.active
{
    border: none;
    padding: 18px 25px;
    color:#fff;
    background: #e74c3c;
    border-radius:0;
}

.tab-content{
    background: #fdfdfd;
    line-height: 25px;
    border: 1px solid #ddd;
    border-top:5px solid #e74c3c;
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
    <style>



/* Profile Pictures */

.profile-picture {
    width: 48px;
    height: 48px;
    padding-top: 2px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
    position: relative;
}

.profile-picture img {
    display: block;
    width: 44px;
    height: 44px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
    border: 2px solid #FFFFFF;
    margin: 0 auto;
}

.profile-picture.has-message::after {
    font-family: "Batch Icons";
    font-size: 2.6rem;
    font-weight: 300;
    line-height: 1;
    display: inline-block;
    content: "\F140";
    color: #07a7e3;
    position: absolute;
    top: -5px;
    left: -10px;
}

.profile-picture.profile-picture-lg {
    width: 150px;
    height: 150px;
    margin: 0 auto;
}

.profile-picture.profile-picture-lg img {
    width: 144px;
    height: 144px;
    margin: 1px auto 0;
    border: 5px solid #FFFFFF;
}

.profile-picture.profile-picture-lg.has-message::after {
    top: -3px;
    left: -7px;
    font-size: 4.6rem;
}
    </style>
@endsection
@section('content')
<div class="ex-basic-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs">
                    <a href="{{route('home')}}">@lang('client.page.home.title')</a><i class="fa fa-angle-double-right"></i><span>@lang('client.page.profile.title')</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ex-basic-2" style="background-color: #eff3f6;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-container">
                    <div class="row">
                        <div class="col-12 col-md-3 pb-3 mb-3 mb-md-0" style="background-color: #fff;">
                            <div class="profile-page-left">
                                <div class="row pt-3">
                                    <div class="col-lg-12">
                                        <div class="profile-picture profile-picture-lg bg-gradient bg-primary mb-4"> <img src="{{auth()->user()->avatar}}" class="img-fluid rounded-circle"></div>
                                        <p class="text-center"> <strong>{{auth()->user()->name}} </strong> </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link" href="{{route('client.change_info')}}" style="border-bottom: 1px solid #e5e5e5;border-radius: 0px !important;">@lang('client.page.profile.sidebar.change_info')</a>
                                @if(auth()->user()->password)
                                <a class="nav-link btn-add-form" href="{{route('client.change_password')}}" style="border-bottom: 1px solid #e5e5e5;border-radius: 0px !important;">@lang('client.page.profile.sidebar.change_password')</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-9" style="/* background-color: #fff; */">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link {{ (request()->is('profile')) ? 'active' : '' }}" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">@lang('client.page.profile.sidebar.profile')</a>
                                    <a class="nav-item nav-link {{ (request()->is('profile/cvs')) ? 'active ' : '' }}" id="nav-cv-tab" data-toggle="tab" href="#nav-cv" role="tab" aria-controls="nav-cv" aria-selected="false">@lang('client.page.profile.sidebar.cv')</a>
                                    <a class="nav-item nav-link {{ (request()->is('profile/job-applied')) ? 'active' : '' }}" id="nav-job-applied-tab" data-toggle="tab" href="#nav-job-applied" role="tab" aria-controls="nav-job-applied" aria-selected="false">@lang('client.page.profile.sidebar.job_applied')</a>
                                </div>
                            </nav>
                            <div class="tab-content px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade px-4 {{ (request()->is('profile')) ? 'show active' : '' }}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ (auth()->user()->avatar) ? auth()->user()->avatar : 'default-img.png' }}" class="img-fluid rounded-circle" alt="">
                                            <h6 class="text-center mt-2">{{auth()->user()->name}}</h6>
                                        </div>
                                        <div class="col-md-9">
                                            <h5>@lang('client.page.profile.title')</h5>
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
                                <div class="tab-pane fade {{ (request()->is('profile/cvs')) ? 'show active ' : '' }} px-4" id="nav-cv" role="tabpanel" aria-labelledby="nav-cv-tab">
                                    <div class="container">
                                    @if(auth()->user()->cv->count() > 0)
                                        <h5 class="mb-4"> @lang('client.page.profile.manage_cv') <a href="{{route('client.create_cv')}}" class="btn btn-primary text-white float-right btn-upload-form">@lang('client.page.profile.create_cv')</a></h5>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="th-inner">@lang('custom.stt')</div>
                                                    </th>
                                                    <th>
                                                        <div class="th-inner">@lang('custom.cv_url')</div>
                                                    </th>
                                                    <th>
                                                        <div class="th-inner text-center">@lang('custom.action')</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $stt = 0; @endphp
                                                @foreach(auth()->user()->cv as $item)
                                                @php $stt++ @endphp
                                                <tr>
                                                    <td>{{$stt}}</td>
                                                    <td><a href="{{$item->cv_url}}" target="_blank">{{$item->cv_name}}</a></td>
                                                    <td class="text-center">    
                                                        <form action="{{route('client.destroy_cv', $item['id'])}}" method="post" class="form-delete-cv-{{$item->id}}" style="display: inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger text-light delete-cv-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <p>@lang('client.page.profile.empty_cv') <a href="{{route('client.create_cv')}}" class="btn btn-primary mx-5 btn-upload-form">@lang('client.page.profile.create_cv')</a></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ (request()->is('profile/job-applied')) ? 'show active ' : '' }} px-4" id="nav-job-applied" role="tabpanel" aria-labelledby="nav-job-applied-tab">
                                    <div class="container">
                                        @if(auth()->user()->job->count() > 0)
                                        <h5 class="mb-4"> @lang('client.page.profile.job_applied')</h5>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="th-inner">@lang('custom.stt')</div>
                                                    </th>
                                                    <th>
                                                        <div class="th-inner">@lang('custom.name')</div>
                                                    </th>
                                                    <th>
                                                        <div class="th-inner">@lang('custom.process')</div>
                                                    </th>
                                                    <th>
                                                        <div class="th-inner text-center">@lang('custom.action')</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $stt = 0; @endphp
                                                @foreach(auth()->user()->job as $key => $item)
                                                @php $stt++ @endphp
                                                <tr>
                                                    <td>{{$stt}}</td>
                                                    <td>{{$item->name}}</td>
                                                    @if(auth()->user()->userjob[$key]->process->count() > 0)
                                                    @for($i = 0; $i <= auth()->user()->userjob[$key]->process->count(); $i++)
                                                        @if( $i == auth()->user()->userjob[$key]->process->count() - 1)
                                                        <td>{{auth()->user()->userjob[$key]->process[$i]->name}}</td>
                                                        @endif
                                                    @endfor
                                                    @elseif(auth()->user()->userjob[$key]->process->count() == 0) 
                                                    <td>Chưa Đánh Giá</td>
                                                    @endif
                                                    <td class="text-center"><a href="{{route('client.applied', [$item->id, $item->slug])}}" target="_blank" class="btn btn-info text-light view-profile" title="Xem"><em class="fa fa-eye"></em></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <p>@lang('client.page.profile.empty_job_applied')
                                            <a href="{{route('client.jobs')}}">@lang('client.page.profile.apply_job')</a>
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.btn-add-form').click(function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.get(url)
            .done(function (results) {
                $('.text-danger').text('');
                $(".modal-content").html(results);
                $("#myModal").modal('show');
            }).fail(function (data) {});
        });

        $("body").on("click", ".btn-reset-pw", function (e) {
            e.preventDefault();
            let domForm = $(this).closest('form');
            $.ajax({
                url: "{{route('client.update_password')}}",
                data: domForm.serialize(),
                method: "POST",
            }).done(function (results) {
                $('.text-danger').text('');
                if(results.success){
                    $("#myModal").modal('hide');
                    swal({
                        title: 'Thành công!',
                        text: 'Dữ liệu đã được cập nhật lại!',
                        type: 'success',
                        icon: 'success'
                    })
                } else {
                    $('.text-danger.show-errors').text(results.error);
                }
            }).fail(function (data) {
                var errors = data.responseJSON;
                $('.text-danger').text('');
                $.each(errors.errors, function (i, val) {
                    domForm.find('input[name=' + i + ']').siblings('.text-danger').text(val[0]);
                });
            });
        });
        
        $('.btn-upload-form').click(function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.get(url)
            .done(function (results) {
                if(results.warning){
                    swal({
                        title: 'Cảnh Báo!',
                        text: results.warning,
                        type: 'warning',
                        icon: 'warning'
                    })
                } else {
                    $('.text-danger').text('');
                    $(".modal-content").html(results);
                    $("#myModal").modal('show');
                }
            }).fail(function (data) {});
        });

        $("body").on("click", ".btn-upload-cv", function (e) {
            e.preventDefault();
            let domForm = $("#formUploadCV");
            let file = $('body').find('input[name=cv_url]')[0].files[0];
            var postData = new FormData(domForm[0]);
            $.ajax({
                url: "{{route('client.upload_cv')}}",
                data: postData,
                dataType: 'json',
                cache : false,
                processData: false,
                contentType: false,
                method: "POST",
            }).done(function (results) {
                $('.text-danger').text('');
                $('#v-pills-cv').html(results);
                $("#myModal").modal('hide');
                swal({
                    title: 'Thành công!',
                    text: 'Dữ liệu đã được cập nhật lại!',
                    type: 'success',
                    icon: 'success'
                })
            }).fail(function (data) {
                var errors = data.responseJSON;
                $('.text-danger').text('');
                $.each(errors.errors, function (i, val) {
                    domForm.find('input[name=' + i + ']').siblings('.text-danger').text(val[0]);
                });
            });
        });

        $("body").on("click", ".delete-cv-confirm", function (e) {
            e.preventDefault();
            let id = $(this).attr('idDelete');
            let form = $('.form-delete-cv-'+id);
            swal({
                title: "Xác nhận xóa?",
                text: "Bản ghi này sẽ không thể khôi phục!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'OK!',
                cancelButtonText: "Cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function(value) {
                if (value.value == true) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
