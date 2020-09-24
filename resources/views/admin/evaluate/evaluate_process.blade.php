@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/evaluate.css') }}">
    <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
    <link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.css" rel="stylesheet"></link>

@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.evaluate.evaluate_process')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.evaluate.evaluate_cvs')</h1>
    </div>
        <div class="col-lg-12">
            <div class="panel-body">
                <div id="msform">
                    @switch($processById->step)
                        @case(1)
                            <ul id="progressbar">
                                <li id="account" class="active"><strong>@lang('custom.evaluate.process_1')</strong></li>
                                <li id="personal" class="active"><strong>@lang('custom.evaluate.process_2')</strong></li>
                                <li id="payment"><strong>@lang('custom.evaluate.process_3')</strong></li>
                                <li id="confirm"><strong>@lang('custom.evaluate.process_4')</strong></li>
                            </ul>
                            <fieldset class="process1">
                                @include('admin.evaluate.review')
                            </fieldset>
                            @break
                        @case(2)
                            <ul id="progressbar">
                                <li id="account" class="active"><strong>@lang('custom.evaluate.process_1')</strong></li>
                                <li id="personal" class="active"><strong>@lang('custom.evaluate.process_2')</strong></li>
                                <li id="payment" class="active"><strong>@lang('custom.evaluate.process_3')</strong></li>
                                <li id="confirm"><strong>@lang('custom.evaluate.process_4')</strong></li>
                            </ul>
                            @include('admin.evaluate.interview')
                            @break
                        @case(3)
                            <fieldset>
                                <div class="form-card">
                                    <div class="col-md-6">
                                        <h3>Đánh giá ứng viên :</h3>
                                    </div>
                                    <div class="col-md-5">
                                        <h3 class="steps">Step 4 - 4</h3>
                                    </div>
                                </div> 
                                <input type="button" name="next" class="previous action-button" value="Finish" />
                            </fieldset>
                            @break
                        @default      
                    @endswitch
                </div>
            </div>   
        </div>
        </div>
</div>

@endsection
@section('script')
    <script src="{{ asset('adminAsset/js/evaluate.js') }}"></script>
    <script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/locale/vi.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
    </script>

      {!! $calendar->script() !!}
      <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap'
            });
        });
    </script>
    
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#modal_add').modal('show');
        @endif
    </script>

    <script>
        new SlimSelect({
            select: '#slim-multi-select'
            })
    </script>


<script>
    $("body").on("click", ".btn-send-email", function (e) {
            e.preventDefault();
            let id = $(this).attr('idEmail');
            let form = $('.form-email-'+id);
            swal({
                title: "Xác nhận gửi emai?",
                text: "Bạn có muốn gửi email cho người này?!",
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

<script>
    $("body").on("click", ".delete-confirm", function (e) {
            e.preventDefault();
            let id = $(this).attr('idDelete');
            let form = $('.form-delete-'+id);
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

<script>
    $("body").on("click", ".btn-add-event", function (e) {
            e.preventDefault();
            let domForm = $(this).closest('form');
            $.ajax({
                url: "{{ route('store.event') }}",
                data: domForm.serialize(),
                method: "POST",
            }).done(function (results) {
                $("#modal_add").modal('hide');
                setTimeout(function(){
                        location.reload();
                    }, 1000);
                swal({
                    title: 'Thành công!',
                    text: 'Dữ liệu đã được cập nhật lại!',
                    type: 'success',
                    icon: 'success'
                })
            }).fail(function (data) {
                var errors = data.responseJSON;
                $.each(errors.errors, function (i, val) {
                    domForm.find('input[name=' + i + ']').siblings('.error-form.text-danger').text(val[0]);
                });
            });
        });

        $("body").on("click", ".btn-edit", function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.get(url)
            .done(function (results) {
                $(".modal-body").html(results);
                $("#modal_add").modal("show");
            }).fail(function (data) {
            });
        });

    $("body").on("click", ".btn-update-event", function (e) {
        e.preventDefault();
        let domForm = $(this).closest('form');
        let url = domForm.attr("action");
        $.ajax({
            url: url,
            data: domForm.serialize(),
            method: "POST",
        }).done(function (results) {
            $("#modal_add").modal('hide');
            swal({
                title: 'Thành công!',
                text: 'Dữ liệu đã được cập nhật lại!',
                type: 'success',
                icon: 'success'
            }).then(result => {
                location.reload();
            });
        }).fail(function (data) {
            var errors = data.responseJSON;
            $.each(errors.errors, function (i, val) {
                domForm.find('input[name=' + i + ']').siblings('.error-form.text-danger').text(val[0]);
            });
        });
    });
</script>

@endsection