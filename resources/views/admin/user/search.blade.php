@if($users->count() > 0)
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
                    <div class="th-inner text-center">@lang('custom.action')</div>
                </th>
            </tr>
        </thead>
        <tbody>
            @php $stt = 1; @endphp
            @foreach($users as $item)
            <tr>
                <td>{{$stt++}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td class="text-center">
                    <a href="{{route('users.show', $item['id'])}}" class="btn btn-primary text-light view-profile"><em class="fa fa-eye"></em></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="fixed-table-pagination">
        <div class="pull-right pagination">
            {{$users->links()}}
        </div>
    </div>
@else
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
                    <div class="th-inner text-center">@lang('custom.action')</div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" class="text-center"><p> @lang('custom.empty_data')</p></td>
            </tr>
        </tbody>
    </table>
@endif