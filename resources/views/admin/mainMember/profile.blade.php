<div class="col-lg-3">
    <img src="{{asset($member->avatar)}}" class="img-responsive" alt="">
</div>
<div class="col-lg-9">
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>@lang('custom.name')</td>
                <td>{{$member->name}}</td>
            </tr>
            <tr>
                <td>@lang('custom.email')</td>
                <td>{{$member->email}}</td>
            </tr>
            <tr>
                <td>@lang('custom.phone')</td>
                <td>{{($member->phone) ? $member->phone : 'null'}}</td>
            </tr>
            <tr>
                <td>@lang('custom.address')</td>
                <td>{{($member->address) ? $member->address : 'null'}}</td>
            </tr>
        </tbody>
    </table>
</div>
