<div class="modal fade bd-example-modal-lg" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('custom.calendar.calendar_add')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/evaluate/process/calendar/create') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-calendar form-group col-md-6">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.name') :</label>
                        <br>
                        <input name="id" type="text" value="{{ $dataUser->id }}" hidden>
                        <input name="process_id" type="text" value="{{ $processById->id }}" hidden>
                        <input name="name" type="text" value="{{ $dataUser->name }}" disabled>
                    </div>
                    <div class="form-calendar form-group col-md-6">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.email') :</label>
                        <br>
                        <input name="email"" type=" text" value="{{ $dataUser->email }}" disabled>
                    </div>
                    <div class="col-12">
                        <div class="form-calendar form-group col-md-6">
                            <label for="exampleFormControlTextarea1">@lang('custom.calendar.title')* :</label>
                            <br>
                            <input name="title" type="text" @error('title') is-invalid @enderror>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-calendar form-group col-md-6">
                            <label for="exampleFormControlTextarea1">@lang('custom.calendar.color')* :</label>
                            <br>
                            <input name="color" type="color" @error('color') is-invalid @enderror>
                            @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-calendar form-group col-md-6">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.start')* :</label>
                        <br>
                        <input name="start" type="datetime-local" @error('start') is-invalid @enderror>
                        @error('start')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-calendar form-group col-md-6">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.end')* :</label>
                        <br>
                        <input name="end" type="datetime-local" @error('end') is-invalid @enderror>
                        @error('end')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-calendar form-group col-md-12">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.attender') :</label>
                        <br>
                        <select name="admins[]" id="slim-multi-select" multiple="multiple" @error('admins') is-invalid @enderror>
                            @foreach ($dataAdmin as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                        @error('admins')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-calendar form-group col-md-12">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.note') :</label>
                        <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-add-event"><span class="fa fa-plus"></span>
                            @lang('custom.calendar.btn_add')</button>
                    </div>
                </form>
            </div>
    {{-- Modal --}}