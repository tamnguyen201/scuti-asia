<div class="col-lg-12 text-center">
    <img src="{{asset($user->avatar)}}" class="img-responsive" style="margin-bottom: 2rem;max-height:22rem;margin-left: auto!important;margin-right: auto!important;border-radius: 5%!important;" alt="">
    <h3><b>{{$user->name}}</b></h3>
    <p><b>{{$user->email}}</b></p>
    <p><b>{{$user->phone}}</b></p>
    <p><b>{{$user->address}}</b></p> <hr>
</div>
<div class="col-lg-12 text-center">
    <h4>Thông tin CV</h4>  
    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    <div class="th-inner text-center">@lang('custom.stt')</div>
                </th>
                <th>
                    <div class="th-inner text-center">@lang('custom.name')</div>
                </th>
            </tr>
        </thead>
        <tbody>
            @php $stt = 1; @endphp
            @foreach($user->cv as $item)
            <tr>
                <td>{{$stt++}}</td>
                <td><a href="{{$item->cv_url}}" target="_blank" >{{$item->cv_name}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
