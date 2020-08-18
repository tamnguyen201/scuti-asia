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
                <td>{{($candidate->phone)}}</td>
            </tr>
            <tr>
                <td>@lang('custom.address')</td>
                <td>{{($candidate->address)}}</td>
            </tr>
            <tr>
                <td>@lang('custom.cv_url')</td>
                <td><a href="{{($candidate->cv->cv_url)}}" target="_blank">@lang('custom.view_more')</a></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label>@lang('custom.letter')</label>
        <textarea cols="30" rows="10" class="form-control" readonly> {{$candidate->letter}} </textarea>
    </div>
</div>
