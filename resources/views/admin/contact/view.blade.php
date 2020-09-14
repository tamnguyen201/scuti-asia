<div class="col-lg-6">
    <h3>Thông tin</h3>
    <table class="table table-hover">
        <tbody>
            <tr>
                <td>@lang('custom.name')</td>
                <td>{{$contact->name}}</td>
            </tr>
            <tr>
                <td>@lang('custom.email')</td>
                <td>{{$contact->email}}</td>
            </tr>
            <tr>
                <td>@lang('custom.visit_type')</td>
                <td>{{$contact->type}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <h3>@lang('custom.message')</h3>
        <textarea name="description" class="form-control" readonly cols="30" rows="10">{{$contact->message}} </textarea>
    </div>
</div>
