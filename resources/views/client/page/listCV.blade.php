@if(auth()->user()->cv->count() > 0)
<h5 class="mb-4"> @lang('client.page.profile.manage_cv') <a href="{{route('client.create_cv')}}" class="btn btn-primary float-right btn-upload-form">@lang('client.page.profile.create_cv')</a></h5>
<table class="table table-hover">
    <thead>
        <tr>
            <th>
                <div class="th-inner">@lang('custom.stt')</div>
                <div class="fht-cell"></div>
            </th>
            <th>
                <div class="th-inner">@lang('custom.name')</div>
                <div class="fht-cell"></div>
            </th>
            <th>
                <div class="th-inner text-center">@lang('custom.cv_url')</div>
                <div class="fht-cell"></div>
            </th>
            <th>
                <div class="th-inner text-center">@lang('custom.action')</div>
                <div class="fht-cell"></div>
            </th>
        </tr>
    </thead>
    <tbody>
        @php $stt = 0; @endphp
        @foreach(auth()->user()->cv as $item)
        @php $stt++ @endphp
        <tr>
            <td>{{$stt}}</td>
            <td>{{$item->cv_name}}</td>
            <td>{{$item->cv_url}}</td>
            <td>    
                <form action="{{route('client.destroy_cv', $item['id'])}}" method="post" class="form-delete-cv-{{$item->id}}" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger text-light delete-cv-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>@lang('client.page.profile.empty_cv') <a href="{{route('client.create_cv')}}" class="btn btn-primary mx-5 btn-upload-form">@lang('client.page.profile.create_cv')</a></p>
@endif