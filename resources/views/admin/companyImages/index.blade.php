@extends('admin.layout.layout')
@section('title', 'Employees Manage')
@section('content')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Images</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Images Manage</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">@lang('custom.button.add')</div>
        <div class="panel-body">
            <form action="{{route('company_images.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <p>Upload new files:</p>
                <label class="btn btn-default">
                    <input type="file" name="image_url">
                </label>
                <button class="btn btn-default">@lang('custom.button.submit')</button>
                @error('image_url') 
                <p class="text-danger"> {{$message}} </p>
                @enderror
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            My Gallery
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                        <div class="th-inner sortable">@lang('custom.stt')</div>
                        <div class="fht-cell"></div>
                        </th>
                        <th>
                            <div class="th-inner sortable">@lang('custom.logo')</div>
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
                    @foreach($images as $item)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td><img class="img-responsive" src="{{$item->image_url}}" alt="" style="width: 100px"></td>
                        <td class="text-center">
                            <a href="{{route('company_images.edit', $item['id'])}}" class="btn btn-primary text-light btn-edit-form"><em class="far fa-edit"></em></a> 
                            <form action="{{route('company_images.destroy', $item['id'])}}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
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
                    {{$images->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
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
