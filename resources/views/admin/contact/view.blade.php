<table class="table">
    <tbody>
        <tr>
            <td style="border-top:0">@lang('custom.name'):</td>
            <td style="border-top:0"><b>{{$contact->name}}</b></td>
        </tr>
        <tr>
            <td style="border-top:0">@lang('custom.email'):</td>
            <td style="border-top:0"><b>{{$contact->email}}</b></td>
        </tr>
        <tr>
            <td style="border-top:0">@lang('custom.visit_type'):</td>
            <td style="border-top:0"><b>{{$contact->type}}</b></td>
        </tr>
    </tbody>
</table>
<div class="form-group">
    <h3>@lang('custom.message')</h3>
    <textarea name="description" class="form-control" readonly cols="30" rows="10">{{$contact->message}} </textarea>
</div>
