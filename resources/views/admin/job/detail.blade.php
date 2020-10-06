@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminAsset/css/job.css') }}">
@endsection
@section('content')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">@lang('custom.jobs.job_detail')</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@lang('custom.page_title.job_detail')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-info-circle" style="font-size: 21px"></span>
                    @lang('custom.page_title.show_infor') <a
                        href="{{ route('candidates.create', ['job_id' => $jobById->id]) }}"
                        class="btn btn-primary btn-add-form" style="float: right"><span class="fa fa-plus"></span>
                        @lang('custom.button.add_candidate')</a></div>
                <div class="panel-body">
                    <div class="detail row">
                        <div class="title col-md-3">
                            <h4>@lang('custom.title') :</h4>
                        </div>
                        <div class="content col-md-8">
                            <p>{{ $jobById->name }}</p>
                        </div>
                    </div>
                    <div class="detail row">
                        <div class="title col-md-3">
                            <h4>@lang('custom.categories') :</h4>
                        </div>
                        <div class="content col-md-8">
                            <p>{{ $jobById->category->category_name }}</p>
                        </div>
                    </div>
                    <div class="detail row">
                        <div class="title col-md-3">
                            <h4>@lang('custom.locations')</h4>
                        </div>
                        <div class="content col-md-8">
                            <p>{{ $jobById->location['name'] }} </p>
                        </div>
                    </div>
                    <div class="detail row">
                        <div class="title col-md-3">
                            <h4>@lang('custom.expire_day'):</h4>
                        </div>
                        <div class="content col-md-8">
                            <p>{{ $jobById->expireDay }}</p>
                        </div>
                    </div>
                    <div class="detail row">
                        <div class="title col-md-3">
                            <h4>@lang('custom.description')</h4>
                        </div>
                        <div class="content col-md-8">
                            <p>{!! $jobById->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="fa fa-list-alt" style="font-size: 21px"></span>
                    @lang('custom.page_title.user_job_list')</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="fixed-table-toolbar">
                            <div class="pull-right search" style="display: flex">
                                <input class="form-control" style="margin-right: 15px" type="text" id="input-search"
                                    placeholder="@lang('custom.placeholder.search')">
                                <button type="button" id="btn-search" class="btn btn-primary" style="margin: 0px"><span
                                        class="fa fa-search"></span> @lang('custom.button.search')</button>
                            </div>
                        </div>
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
                                                <div class="th-inner">@lang('custom.cv_url')</div>
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
                                        @foreach ($candidates as $candidate)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>{{ $candidate->user->name }}</td>
                                                <td>{{ $candidate->user->email }}</td>
                                                <td>{{ $candidate->job->name }}</td>
                                                <td><a href="{{ $candidate->cv_file }}"
                                                        target="_blank">@lang('custom.view_cv')</a></td>
                                                @if ($candidate->process->count() > 0 && $candidate->process->count() < 4)
                                                    @for ($i = 0; $i <= $candidate->process->count(); $i++)
                                                        @if ($i == $candidate->process->count() - 1)
                                                            <td>
                                                                @if ($candidate->process[$i]->step < 4)
                                                                    <a href="{{ route('evaluate.candidate.show', $candidate->process[$i]->id) }}"
                                                                        style="text-decoration: none">
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
                                                                {{ $candidate->process[$i]->name }}
                                                                </span>
                                                                </a>
                                                                <br>
                                                                @if ($candidate->process[$i]->step == '3' && $candidate->result == 1)
                                                                    <span class="label label-success">Ứng viên đã chấp nhận
                                                                        công việc</span>
                                                                @elseif($candidate->process[$i]->step == '3' &&
                                                                    $candidate->result == 2 && $candidate->result != null)
                                                                    <span class="label label-primary">Ứng viên đã không nhận
                                                                        công việc</span>
                                                                @elseif($candidate->process[$i]->step == '3' &&
                                                                    $candidate->result == null)
                                                                    <span class="label label-success">Đang chờ ứng viên phản
                                                                        hồi</span>
                                                                @endif
                                                            @elseif($candidate->process[$i]->step = 4)
                                                                <p class="label label-danger">
                                                                    {{ $candidate->process[$i]->name }}</p>
                                                        @endif
                                                        <br>


                                                        </td>
                                                    @endif
                                                @endfor
                                            @elseif($candidate->process->count() == 4)
                                                <td style="font-size: 75%;font-weight: bold; color: #5cb85c">
                                                    @lang('custom.finished')</td>
                                            @else
                                                <td style="font-size: 75%;font-weight: bold;color: red">
                                                    @lang('custom.applied')</td>
                                        @endif

                                        <td>
                                            <a href="{{ route('candidates.show', $candidate->user->id) }}"
                                                class="btn btn-info text-light view-profile" title="Xem"><em
                                                    class="fa fa-eye"></em></a>
                                            @if ($candidate->process->count() == 0)
                                                <form action="{{ route('start.evaluate', $candidate->id) }}" method="post"
                                                    class="form-delete-{{ $candidate->id }}" style="display: inline">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-warning text-light start-confirm"
                                                        idStart={{ $candidate->id }} title="Bắt đầu đánh giá"><em
                                                            class="fas fa-random"></em></button>
                                                </form>
                                            @endif
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="fixed-table-pagination">
                                    <div class="pull-right pagination">
                                        {{ $candidates->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-md" style="max-width: 40rem;" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="display: flex">
                                    <h3 class="modal-title" id="exampleModalLongTitle" style="margin: auto;width: 23rem;">
                                        @lang('custom.candidate.candidate_infor')</h3>
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
            $("#btn-search").on('click', function() {
                let value = $('#input-search').val();
                let keyword = value.trim();
                if (keyword != '') {
                    $.ajax({
                        url: "{{ route('candidates.search') }}",
                        data: {
                            'keyword': keyword,
                            'job_id': {
                                {
                                    $jobById - > id
                                }
                            }
                        },
                        method: "POST",
                    }).done(function(results) {
                        $(".fixed-table-body").html(results);
                    });
                };
            });

            $('.view-profile').on('click', function(event) {
                event.preventDefault();
                let url = $(this).attr('href');
                $.get(url)
                    .done(function(results) {
                        $(".modal-body").html(results);
                        $("#exampleModalCenter").modal('show');
                    }).fail(function(data) {});
            });

            $('.send-mail').on('click', function(event) {
                event.preventDefault();
                let url = $(this).attr('href');
                $.get(url)
                    .done(function(results) {
                        $(".modal-body").html(results);
                        $("#exampleModalCenter").modal('show');
                    }).fail(function(data) {});
            });


            $("body").on("click", ".start-confirm", function(e) {
                e.preventDefault();
                let id = $(this).attr('idStart');
                let form = $('.form-delete-' + id);
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
