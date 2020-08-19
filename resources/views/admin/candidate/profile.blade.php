<div class="col-lg-3">
    <img src="{{asset($candidate->avatar)}}" class="img-responsive" alt="">
</div>
<div class="col-lg-9">
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>@lang('custom.name')</td>
                <td>{{$candidate->user->name}}</td>
            </tr>
            <tr>
                <td>@lang('custom.email')</td>
                <td>{{$candidate->user->email}}</td>
            </tr>
            <tr>
                <td>@lang('custom.phone')</td>
                <td>{{($candidate->phone) ? $candidate->phone : 'null'}}</td>
            </tr>
            <tr>
                <td>@lang('custom.address')</td>
                <td>{{($candidate->address) ? $candidate->address : 'null'}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-lg-12">
<label>@lang('custom.page_title.data_table')</label>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    <div class="th-inner sortable">@lang('custom.stt')</div>
                    <div class="fht-cell"></div>
                </th>
                <th>
                    <div class="th-inner sortable">@lang('custom.cv_url')</div>
                    <div class="fht-cell"></div>
                </th>
            </tr>
        </thead>
        <tbody>
            @php $stt = 1; @endphp
            @foreach($candidate->cv as $item)
            <tr>
                <td>{{$stt++}}</td>
                <td><a href="{{asset($item->cv_url)}}" target="_blank">@lang('custom.view_more')</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
