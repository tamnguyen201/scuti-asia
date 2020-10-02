<link rel="stylesheet" href="{{ asset('adminAsset/css/job.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
<table class="table table-hover">
    <thead>
        <tr>
            <th style="">
                <div class="th-inner sortable">No. </div>
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
                <input data-id="{{$item->id}}" class="toggle-class js-switch" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $item->status ? 'checked' : '' }}>
            </td>
            <td>{{Auth::guard('admin')->user()->name}}</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
    </script>
