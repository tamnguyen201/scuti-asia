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
                            <div class="col-md-8">
                                <fieldset>
                                    <div class="form-card">
                                        <div class="col-md-6">
                                            <h3>@lang('custom.evaluate.candidate_evaluate') :</h3>
                                        </div>
                                        <div class="col-md-5">
                                            <h3 class="steps">@lang('custom.evaluate.step') 3 - 4</h3>
                                        </div>
                                    </div>
                                    @include('admin.evaluate.calendar')
                                </fieldset>
                            </div>
                            <div class="list col-md-4">
                                <fieldset>
                                <h3 class="list-title"><span class="fa fa-list-alt"></span> Danh sách :</h3>
                                <hr>
                                @foreach ($data as $item)
                                    <div class="list-interview col-md-12" style="width: 30rem; padding-bottom:15px; display:inline-block">
                                        <div class="body" style="text-align:center; display:block">
                                            <h4 class="card-title">{{ $item->title }}</h4>
                                            <h6 class="subtitle mb-4 text-muted">{{ \Carbon\Carbon::parse($item->start)->format('d/m/Y') }}</h6>
                                        </div>
                                        <div class="button col-md-12" style="float: right">
                                            <div class="col-md-9 btn-email" style="display: inline-block">
                                                @if ($item->email_status ==1)
                                                    <span class="label label-success email-success">Đã gửi email</span>
                                                @else
                                                    <form action="{{ route('send.event.email') }}" method="POST" class="form-email-{{$item->id}}" style="display: inline-block; float: right">
                                                        @csrf
                                                        <input name="event_id" type="text" value="{{ $item->id }}" hidden>
                                                        <input name="email" type="text" value="{{ $item->user->email }}" hidden>
                                                        <input name="name" type="text" value="{{ $item->user->name }}" hidden>
                                                        <input name="time" type="text" value="{{ \Carbon\Carbon::parse($item->start)->format('d/m/Y - H:i') }}" hidden>
                                                        <input name="job" type="text" value="{{ $jobById->name }}" hidden>
                                                        <button class="btn btn-warning btn-send-email" style="padding-right: 15px" idEmail={{$item->id}}><span
                                                            class="fa fa-envelope-o"></span></button>
                                                    </form>
                                                @endif
                                            </div>
                                            <div class="col-md-3" style="display: inline-block">
                                                <form action="{{route('event.delete', $item->id)}}" method="post" class="form-delete-{{$item->id}}" style="display: inline-block; float:right">
                                                    @csrf
                                                    <button class="btn btn-danger text-light delete-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <br>
                            </fieldset>
                            </div>
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

@endsection