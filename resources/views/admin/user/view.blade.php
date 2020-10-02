@if($user->cv->count() > 0)
<div class="col-lg-6 text-center">
    <img src="{{asset($user->avatar)}}" class="img-responsive" style="margin-bottom: 2rem;max-height:22rem;margin-left: auto!important;margin-right: auto!important;border-radius: 5%!important;" alt="">
    <h3><b>{{$user->name}}</b></h3>
    <p><b>{{$user->email}}</b></p>
    <p><b>{{$user->phone}}</b></p>
    <p><b>{{$user->address}}</b></p>
</div>
<div class="col-lg-6 text-center">
    <h4>Thông tin CV</h4>  
    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    <div class="th-inner text-left">@lang('custom.stt')</div>
                </th>
                <th>
                    <div class="th-inner text-left">@lang('custom.name')</div>
                </th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $stt = 1; @endphp
            @foreach($user->cv as $item)
            <tr>
                <td class="text-left">{{$stt++}}</td>
                <td colspan="4" class="text-left"><a href="{{$item->cv_url}}" target="_blank" >{{$item->cv_name}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="col-lg-12 text-center">
    <img src="{{asset($user->avatar)}}" class="img-responsive" style="margin-bottom: 2rem;max-height:22rem;margin-left: auto!important;margin-right: auto!important;border-radius: 5%!important;" alt="">
    <h3><b>{{$user->name}}</b></h3>
    <p><b>{{$user->email}}</b></p>
    <p><b>{{$user->phone}}</b></p>
    <p><b>{{$user->address}}</b></p>
</div>
@endif
