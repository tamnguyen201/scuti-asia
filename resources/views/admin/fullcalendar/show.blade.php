@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminAsset/css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/evaluate.css') }}">
    <link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.calendar.calendar')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.calendar.calendar_schedule')</h1>
    </div>
</div>
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-body" style="padding-top: 5%">
        {!! $calendar->calendar() !!}
       </div>
    </div>
 </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/locale/vi.js') }}"></script>

    {!! $calendar->script() !!}
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap'
            });
        });
    </script>
@endsection