<div class="col-lg-3">
    <img src="{{asset($employee->avatar)}}" class="img-responsive" alt="">
</div>
<div class="col-lg-9">
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>{{trans('custom.name')}}</td>
                <td>{{$employee->user->name}}</td>
            </tr>
            <tr>
                <td>{{trans('custom.email')}}</td>
                <td>{{$employee->user->email}}</td>
            </tr>
            <tr>
                <td>{{trans('custom.phone')}}</td>
                <td>{{($employee->phone) ? $employee->phone : 'null'}}</td>
            </tr>
            <tr>
                <td>{{trans('custom.address')}}</td>
                <td>{{($employee->address) ? $employee->address : 'null'}}</td>
            </tr>
        </tbody>
    </table>
</div>
