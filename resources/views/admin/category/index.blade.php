@extends('admin.layout.layout')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Categories</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Data Table</div>
       <div class="panel-body">
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                    <a href="{{route('categories.create')}}" class="btn btn-primary btn-add-form" style="float: right"><span class="fa fa-plus"></span> Add New</a>
                </div>
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="">
                                        <div class="th-inner sortable">No.</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="">
                                        <div class="th-inner sortable">Category :<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="">
                                        <div class="th-inner sortable">Status :<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="">
                                        <div class="th-inner sortable">Created by :<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="">
                                        <div class="th-inner sortable text-center">Action</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-list-role">
                                @php $stt =1; @endphp
                                @foreach($categories as $item)
                                <tr class="data-role-{{$item->id}}">
                                    <td>{{$stt++}}</td>
                                    <td>{{$item->category_name}}</td>
                                    <td>
                                        <input data-id="{{$item->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $item->status ? 'checked' : '' }}>
                                    </td>
                                    <td>{{auth()->user()->name}}</td>
                                    <td class="text-center">
                                        <a href="{{route('categories.edit', $item['id'])}}" class="btn btn-primary text-light btn-edit-form"><em class="far fa-edit"></em></a> 
                                        <form action="{{route('categories.destroy', $item['id'])}}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
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
                                {{$categories->links()}}
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
@endsection
@section('script')
    <script type="text/javascript">
        $('.btn.btn-primary.btn-add-form').click(function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.get(url)
            .done(function (results) {
            $(".modal-body").html(results);
            $("#myModal").modal('show');
            }).fail(function (data) {
            });
        });
        
        $("body").on("click", ".btn.btn-primary.btn-add-category", function (e) {
            e.preventDefault();
            let domForm = $(this).closest('form');
            $.ajax({
                url: "{{ route('categories.store') }}",
                data: domForm.serialize(),
                method: "POST",
            }).done(function (results) {
                $("#myModal").modal('hide');
                $(".fixed-table-body").html(results);
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

        $("body").on("change", ".toggle-class", function (e) {
            e.preventDefault();
            var status = $(this).prop('checked') == true ? 1 : 0; 
            var category_id = $(this).data('id'); 
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/admin/changeCategoryStatus',
                data: {'status': status, 'category_id': category_id},
                success: function (data) {
                    console.log(data.success)
                }
            });
        });

    </script>
@endsection