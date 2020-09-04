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
                                    <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.name')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.email')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.jobApplied')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable">@lang('custom.process')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th>
                                        <div class="th-inner sortable text-center">@lang('custom.action')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 1; @endphp
                                @foreach($candidates as $candidate)
                                    @foreach($candidate->job as $key => $item)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td>{{$candidate->name}}</td>
                                        <td>{{$candidate->email}}</td>
                                        <td>{{$item->name}}</td>
                                        @if($candidate->userjob[$key]->process->count() > 0)
                                            @for($i = 0; $i <= $candidate->userjob[$key]->process->count(); $i++)
                                                @if($i == $candidate->userjob[$key]->process->count() - 1)
                                                <td>{{$candidate->userjob[$key]->process[$i]->name}}</td>
                                                @endif
                                            @endfor
                                        @else
                                        <td>@lang('custom.applied')</td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{route('candidates.show', $candidate['id'])}}" class="btn btn-info text-light view-profile" title="Xem"><em class="fa fa-eye"></em></a>
                                        </td>
                                    </tr>
                                    @endforeach
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
