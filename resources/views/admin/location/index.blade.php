@extends('admin.layout.layout')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Locations</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Locations Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Data Table</div>
       <div class="panel-body">
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                    <button class="btn btn-primary btn-add-form" style="float: right"><span class="fa fa-plus"></span> Add New</button>
                </div>
                <div class="fixed-table-container">
                    <div class="fixed-table-header">
                    <table></table>
                    </div>
                    <div class="fixed-table-body">
                    <div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
                    <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
                        <thead>
                            <tr>
                                <th style="">
                                <div class="th-inner sortable">No. </div>
                                <div class="fht-cell"></div>
                                </th>
                                <th style="">
                                <div class="th-inner sortable">Location<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div>
                                <div class="fht-cell"></div>
                                </th>
                                <th style="">
                                <div class="th-inner sortable text-center">Action</div>
                                <div class="fht-cell"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-list">
                            @php $stt =1; @endphp
                            @foreach($locations as $item)
                            <tr class="{{$item->id}}">
                                <td>{{$stt++}}</td>
                                <td>{{$item->name}}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-primary text-light btn-edit-form"><em class="far fa-edit"></em></a> 
                                    <form action="" method="post" class="form-delete-{{$item->id}}" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger text-light delete-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="fixed-table-pagination">
                    <div class="pull-right pagination">
                        {{$locations->links()}}
                    </div>
                    </div>
                </div>
            </div>
          <div class="clearfix"></div>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Location Managea</h5>
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
@endsection
@section('script')
    <script type="text/javascript">
        $('.btn.btn-primary.btn-add-form').click(function () {
            $(".modal-body").html(
                    `<form>
                    @csrf
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="recipient-name">
                      <span class="error-form text-danger"></span>
                    </div>
                    <button type="button" class="btn btn-primary btn-add-location">Submit</button>
                  </form>`
                );
            $("#myModal").modal('show');
        });
        $("body").on("click", ".btn.btn-primary.btn-add-location", function (e) {
            e.preventDefault();
            let domForm = $(this).closest('form');
            $.ajax({
                url: "{{ route('location.store') }}",
                data: domForm.serialize(),
                method: "POST",
            }).done(function (results) {
                $("#myModal").modal('hide');
                $(".table-list").append(`
                    <tr class="${results.id}">
                        <td>${results.id}</td>
                        <td>${results.name}</td>
                        <td class="text-center">
                            <a href="/admin/locations/${results.id}/edit" class="btn btn-primary text-light btn-edit-form"><em class="far fa-edit"></em></a> 
                            <form action="/admin/locations/${results.id}" method="post" class="form-delete-${results.id}" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger text-light delete-confirm" idDelete=${results.id}><em class="fas fa-trash-alt"></em></button>
                            </form>
                        </td>
                    </tr>
                `);
                Swal.fire(
                    'Thành công!',
                    'Dữ liệu đã được cập nhật lại!',
                    'success'
                )
            }).fail(function (data) {
                var errors = data.responseJSON;
                $.each(errors.errors, function (i, val) {
                    domForm.find('input[name=' + i + ']').siblings('.error-form.text-danger').text(val[0]);
                });
            });
        });
        
       
    </script>
@endsection