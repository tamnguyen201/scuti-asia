@extends('admin.layout.layout')
@section('title', 'Roles Manage')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Roles</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Roles Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
       <div class="panel-heading">Data Table</div>
       <div class="panel-body">
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="float: right"><span class="fa fa-plus"></span> Add New</button>
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
                                <div class="th-inner sortable">Stt</div>
                                <div class="fht-cell"></div>
                                </th>
                                <th style="">
                                <div class="th-inner sortable">Role Name<span class="order"><span class="caret" style="margin: 10px 5px;"></span></span></div>
                                <div class="fht-cell"></div>
                                </th>
                                <th style="">
                                <div class="th-inner sortable text-center">Action</div>
                                <div class="fht-cell"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $stt =1; @endphp
                            @foreach($roles as $item)
                            <tr data-index="0">
                                <td>{{$stt++}}</td>
                                <td>{{$item->name}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.roles.edit', $item['id'])}}" class="btn btn-primary text-light"><em class="far fa-edit"></em></a> 
                                    <form action="{{route('admin.roles.delete', $item['id'])}}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
                                        @csrf
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
                        {{$roles->links()}}
                    </div>
                    </div>
                </div>
            </div>
          <div class="clearfix"></div>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Role Manage</h5>
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
                    <button type="button" class="btn btn-primary btn-add-role">Submit</button>
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
        $('.btn.btn-primary.btn-add-role').click(function (e) {
            e.preventDefault();
            let domForm = $(this).closest('form');
            $.ajax({
                url: "{{ route('admin.roles.store') }}",
                data: domForm.serialize(),
                method: "POST",
            }).done(function (results) {
                console.log(results);
                $("#myModal").modal('hide');
                domForm.reset();
            }).fail(function (data) {
                var errors = data.responseJSON;
                $.each(errors.errors, function (i, val) {
                    domForm.find('input[name=' + i + ']').siblings('.error-form.text-danger').text(val[0]);
                });
            });
        });

        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            let id = $(this).attr('idDelete');
            let form = $('.form-delete-'+id);
            swal({
                title: "Are you sure?",
                text: "You will not be able to restore this record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
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
         $(document).ready(function() {
            $("#btn-add").click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/tasks',
                    data: {
                        task: $("#frmAddTask input[name=task]").val(),
                        description: $("#frmAddTask input[name=description]").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#frmAddTask').trigger("reset");
                        $("#frmAddTask .close").click();
                        window.location.reload();
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        $('#add-task-errors').html('');
                        $.each(errors.messages, function(key, value) {
                            $('#add-task-errors').append('' + value + '');
                        }); 
                        $("#add-error-bag").show(); 
                    } 
                }); 
            }); 
        });
    </script>
@endsection
