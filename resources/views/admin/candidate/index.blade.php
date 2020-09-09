@extends('admin.layout.layout')
@section('title', trans('custom.page_title.candidate_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.candidate_manage')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.candidate_manage')</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('custom.page_title.data_table')</div>
            <div class="panel-body">
                <div class="bootstrap-table">
                    <div class="fixed-table-container">
                        <div class="fixed-table-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                    <div class="th-inner sortable">@lang('custom.stt')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.name')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.email')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.jobApplied')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.process')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable text-center">@lang('custom.action')</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 1; @endphp
                                @foreach($candidates as $candidate)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td>{{$candidate->user->name}}</td>
                                        <td>{{$candidate->user->email}}</td>
                                        <td>{{$candidate->job->name}}</td>
                                        <td>
<<<<<<< HEAD
                                            <a href="{{route('candidates.show', $candidate['id'])}}" class="btn btn-info text-light view-profile" title="Xem"><em class="fa fa-eye"> Xem</em></a>
                                            @if ($candidate->userjob[$key]->process->count() == 0)
                                                <form action="{{route('start.evaluate', $candidate->userjob[$key]->id)}}" method="post" class="form-delete-{{$candidate->userjob[$key]->id}}" style="display: inline">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-warning text-light start-confirm" idStart={{$candidate->userjob[$key]->id}} title="Bắt đầu đánh giá"><em class="fas fa-random"> Bắt đầu đánh giá</em></button>
=======
                                            @if($candidate->process->count() > 0 && $candidate->process->count() < 4)
                                                @for($i = 0; $i <= $candidate->process->count(); $i++)
                                                    @if($i == $candidate->process->count() - 1)
                                                        <a href="{{ route('evaluate.candidate.show', $candidate->process[$i]->id) }}" style="text-decoration: none">
                                                            <span @if ($candidate->process[$i])
                                                                @switch($i)
                                                                    @case(0)
                                                                        class="label label-primary"
                                                                        @break
                                                                    @case(1)
                                                                        class="label label-success"
                                                                        @break
                                                                    @case(2)
                                                                        class="label label-warning"
                                                                        @break
                                                                    @case(3)
                                                                        class="label label-info"
                                                                        @break
                                                                @endswitch
                                                            @endif>
                                                                {{$candidate->process[$i]->name}}
                                                            
                                                            </span>
                                                        </a>
                                                    @endif
                                                @endfor
                                            @elseif($candidate->process->count() == 4)
                                                @lang('custom.finished')
                                            @else
                                                @lang('custom.applied')
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('candidates.show', $candidate->user->id)}}" class="btn btn-info text-light view-profile" title="Xem"><em class="fa fa-eye"></em></a>
                                            @if ($candidate->process->count() == 0)
                                                <form action="{{route('start.evaluate', $candidate->id)}}" method="post" class="form-delete-{{$candidate->id}}" style="display: inline">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-warning text-light start-confirm" idStart={{$candidate->id}} title="Bắt đầu đánh giá"><em class="fas fa-random"></em></button>
>>>>>>> 85be6fb8d981c43d9832df7a9b0f5833a6a348f0
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                                {{$candidates->links()}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">@lang('custom.candidate.candidate_infor')</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer" style="border-top: none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('.view-profile').on('click', function (event) {
            event.preventDefault();
            let url = $(this).attr('href');
            $.get(url)
            .done(function (results) {
                $(".modal-body").html(results);
                $("#exampleModalCenter").modal('show');
            }).fail(function (data) {
            });
        });

        $('.send-mail').on('click', function (event) {
            event.preventDefault();
            let url = $(this).attr('href');
            $.get(url)
            .done(function (results) {
                $(".modal-body").html(results);
                $("#exampleModalCenter").modal('show');
            }).fail(function (data) {
            });
        });


        $("body").on("click", ".start-confirm", function (e) {
            e.preventDefault();
            let id = $(this).attr('idStart');
            let form = $('.form-delete-'+id);
            swal({
                title: "Xác nhận?",
                text: "Bắt đầu đánh giá ứng viên này",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#5cb85c',
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
