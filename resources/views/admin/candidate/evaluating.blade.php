@extends('admin.layout.layout')
@section('title', trans('custom.page_title.candidate_manage'))
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">
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
                                        <div class="th-inner">@lang('custom.stt')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner">@lang('custom.name')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner">@lang('custom.email')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner">@lang('custom.jobApplied')</div>
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
                                @php $stt = 1; @endphp
                                @foreach($candidates as $candidate)
                                    @if(0 < $candidate->process->count() && $candidate->process->count() < 4)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td>{{$candidate->user->name}}</td>
                                        <td>{{$candidate->user->email}}</td>
                                        <td>{{$candidate->job->name}}</td>
                                        @for($i = 0; $i <= $candidate->process->count(); $i++)
                                            @if($i == $candidate->process->count() - 1)
                                            <td>{{$candidate->process[$i]->name}}</td>
                                            @endif
                                        @endfor
                                        <td class="text-center">
                                            <a href="{{route('candidates.show', $candidate['id'])}}" class="btn btn-info text-light view-profile" title="Xem"><em class="fa fa-eye"></em></a>
                                        </td>
                                    </tr>
                                    @endif
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
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">@lang('custom.page_title.profile')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer" style="border-top: none">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('custom.button.close')</button>
                        </div>
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

    </script>
@endsection
