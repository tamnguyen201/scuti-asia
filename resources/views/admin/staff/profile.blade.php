<div class="col-lg-3">
    <img src="{{asset($employee->avatar)}}" class="img-responsive" alt="">
</div>
<div class="col-lg-9">
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>@lang('custom.name')</td>
                <td>{{$employee->name}}</td>
            </tr>
            <tr>
                <td>@lang('custom.email')</td>
                <td>{{$employee->email}}</td>
            </tr>
            <tr>
                <td>@lang('custom.phone')</td>
                <td>{{($employee->phone) ? $employee->phone : 'null'}}</td>
            </tr>
            <tr>
                <td>@lang('custom.address')</td>
                <td>{{($employee->address) ? $employee->address : 'null'}}</td>
            </tr>
        </tbody>
    </table>
</div>
