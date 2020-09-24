@extends('admin.layout.layout')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('adminAsset/css/job.css') }}">
@endsection
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">@lang('custom.page_title.jobs')</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">@lang('custom.page_title.job_manage')</h1>
    </div>
</div>
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">@lang('custom.page_title.jobs')</div>
       <div class="panel-body">
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                    <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-add-form" style="float: right; margin: 1rem"><span class="fa fa-plus"></span> @lang('custom.button.add')</a>
                    <div class="pull-right search" style="display: flex">
                        <input class="form-control" style="margin-right: 5px" type="text" id="input-search" placeholder="@lang('custom.placeholder.search')">
                        <button type="button" id="btn-search" class="btn btn-primary" style="margin: 0px">@lang('custom.button.search')</button>
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
                                        <div class="th-inner">@lang('custom.title')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner">@lang('custom.categories')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner">@lang('custom.jobs.date')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner">@lang('custom.status')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner">@lang('custom.jobs.candidate_number')</div>
                                    </th>
                                    <th>
                                        <div class="th-inner text-center">@lang('custom.action')</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 1; @endphp
                                @foreach($jobs as $item)
                                <tr>
                                    <td>{{$stt++}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->expireDay)->format('d/m/Y')}}
                                    </td>
                                    <td>
                                        <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                                    </td>
                                    <td>{{ count($item->user) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('job.detail', ['id' => $item->id]) }}" class="btn btn-primary text-light view-profile"><em class="fa fa-eye"></em></a>
                                        <a href="{{ route('jobs.edit', $item->id) }}" class="btn btn-primary text-light"><em class="far fa-edit"></em></a> 
                                        <form action="{{ route('jobs.destroy',$item->id) }}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-light delete-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                                {{$jobs->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="clearfix"></div>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Categories Manage</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Name</label>
                          <input type="text" name="name" class="form-control" id="recipient-name">
                          <span class="error-form text-danger"></span>
                        </div>
                        <button type="button" class="btn btn-primary btn-add-location">Submit</button>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });

        $(document).ready(function(){
            $('.js-switch').change(function () {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let job_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('job.update.status') }}',
                    data: {'status': status, 'job_id': job_id},
                    success: function (data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.success);
                    }
                });
            });
        });

        $("#btn-search").on('click', function() {
            let value = $('#input-search').val();
            let keyword = value.trim();
            if (keyword != '') {
                $.ajax({
                    url: "{{ route('admin.job.search') }}",
                    data: {
                        'keyword': keyword
                    },
                    method: "POST",
                }).done(function(results) {
                    $(".fixed-table-body").html(results);
                });
            };
        });

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