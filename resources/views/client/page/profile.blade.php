@extends('client.layout.master')
@section('title', trans('custom.page_title.company_manage'))
@section('content')
<div class="ex-basic-1"  style="padding-top: 7rem">
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
<div class="ex-basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-container">
                    <div class="row">
                        <div class="col-12 col-md-3 mb-3 mb-md-0">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">@lang('client.page.profile.side_bar.profile')</a>
                                <a class="nav-link" id="v-pills-cv-tab" data-toggle="pill" href="#v-pills-cv" role="tab" aria-controls="v-pills-cv" aria-selected="false">@lang('client.page.profile.side_bar.cv')</a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">@lang('client.page.profile.side_bar.job_applied')</a>
                                <a class="nav-link" href="{{route('client.change_info')}}">@lang('client.page.profile.side_bar.change_info')</a>
                                @if(auth()->user()->password)
                                <a class="nav-link btn-add-form" href="{{route('client.change_password')}}">@lang('client.page.profile.side_bar.change_password')</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5>@lang('custom.avatar')</h5>
                                            <img src="default-img.png" class="img-fluid" alt="">
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
                                <div class="tab-pane fade table-responsive" id="v-pills-cv" role="tabpanel" aria-labelledby="v-pills-cv-tab">
                                    @if(auth()->user()->cv->count() > 0)
                                    <h5 class="mb-4"> @lang('client.page.profile.manage_cv') <a href="{{route('client.create_cv')}}" class="btn btn-primary float-right btn-upload-form">@lang('client.page.profile.create_cv')</a></h5>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-inner">@lang('custom.stt')</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th>
                                                    <div class="th-inner">@lang('custom.name')</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th>
                                                    <div class="th-inner text-center">@lang('custom.cv_url')</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th>
                                                    <div class="th-inner text-center">@lang('custom.action')</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $stt = 0; @endphp
                                            @foreach(auth()->user()->cv as $item)
                                            @php $stt++ @endphp
                                            <tr>
                                                <td>{{$stt}}</td>
                                                <td>{{$item->cv_name}}</td>
                                                <td>{{$item->cv_url}}</td>
                                                <td>    
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
                                <div class="tab-pane fade table-responsive" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    @if(auth()->user()->cv->count() > 0)
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="th-inner">@lang('custom.stt')</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th>
                                                    <div class="th-inner">@lang('custom.name')</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th>
                                                    <div class="th-inner text-center">@lang('custom.action')</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $stt = 0; @endphp
                                            @foreach(auth()->user()->cv as $item)
                                            @php $stt++ @endphp
                                            <tr>
                                                <td>{{$stt}}</td>
                                                <td>@lang('custom.name')</td>
                                                <td>{{auth()->user()->name}}</td>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">@lang('custom.page_title.change_password')</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <span class="text-center text-danger show-errors"></span>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
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
                $(".modal-body").html(results);
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
                    $(".modal-body").html(results);
                    $("#myModal").modal('show');
                }
            }).fail(function (data) {});
        });

        $("body").on("click", ".btn-upload-cv", function (e) {
            e.preventDefault();
            let domForm = $(this).closest('form');
            $.ajax({
                url: "{{route('client.upload_cv')}}",
                data: domForm.serialize(),
                dataType:'JSON',
                method: "POST",
            }).done(function (results) {
                $('.text-danger').text('');
                $('#v-pills-cv').text(results);
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
