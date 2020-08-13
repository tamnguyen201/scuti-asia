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
    <tbody class="table-list-role">
        @php $stt =1; @endphp
        @foreach($roles as $item)
        <tr class="data-role-{{$item->id}}">
            <td>{{$stt++}}</td>
            <td>{{$item->name}}</td>
            <td class="text-center">
                <a href="{{route('roles.edit', $item['id'])}}" class="btn btn-primary text-light btn-edit-form"><em class="far fa-edit"></em></a> 
                <form action="{{route('roles.destroy', $item['id'])}}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
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
        {{$roles->links()}}
    </div>
</div>