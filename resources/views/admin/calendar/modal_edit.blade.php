<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.css" rel="stylesheet"></link>
<script>
    new SlimSelect({
        select: '#slim-multi-select'
        })
</script>
<form action="{{ route('update.event', $event->id) }}">
    @csrf
    <div class="col-12">
        <div class="form-calendar form-group col-md-6">
            <label for="exampleFormControlTextarea1">@lang('custom.calendar.title')* :</label>
            <br>
            <input name="title" type="text" value="{{ $event->title }}">
            <span class="error-form text-danger"></span>
        </div>
        <div class="form-calendar form-group col-md-6">
            <label for="exampleFormControlTextarea1">@lang('custom.calendar.color')* :</label>
            <br>
            <input name="color" type="color" value="{{ $event->title }}" disabled>
            <span class="error-form text-danger"></span>
        </div>
    </div>
    <div class="form-calendar form-group col-md-12">
        <label for="exampleFormControlTextarea1">@lang('custom.calendar.start')* :</label>
        <br>
        <input name="start" type="datetime-local" value="{{ \Carbon\Carbon::parse($event->start)->format('Y-m-d\TH:i:s') }}">
        <span class="error-form text-danger"></span>
    </div>
    <div class="form-calendar form-group col-md-12">
        <label for="exampleFormControlTextarea1">@lang('custom.calendar.end')* :</label>
        <br>
        <input name="end" type="datetime-local" value="{{ \Carbon\Carbon::parse($event->end)->format('Y-m-d\TH:i:s') }}">
        <span class="error-form text-danger"></span>
    </div>
    <div class="form-calendar form-group col-md-12">
        <label for="exampleFormControlTextarea1">@lang('custom.calendar.attender') :</label>
        <br>
        <select name="admins[]" id="slim-multi-select" multiple="multiple">
            @foreach($dataAdmin as $admin)
            @php $flag = 0; @endphp
                @foreach($admins as $admin_attender)
                    @if($admin_attender == $admin->id)
                    @php $flag++; @endphp
                        <option value="{{ $admin->id }}" selected>{{ $admin->name }}</option>
                    @endif
                    @endforeach
                    @if($flag == 0)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endif
            @endforeach
        </select>
        <span class="error-form text-danger"></span>
    </div>
    <div class="form-calendar form-group col-md-12">
        <label for="exampleFormControlTextarea1">@lang('custom.calendar.note') :</label>
        <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $event->note }}</textarea>
        <span class="error-form text-danger"></span>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn-update-event"><span class="fa fa-plus"></span>
            @lang('custom.calendar.btn_update')</button>
    </div>
</form>