<div class="row">
    <div class="col-md-8">
        <div class="panel-body">
            {!! $calendar->calendar() !!}
        </div>
    </div>
    <div class="panel-body col-md-4">
        <h3 class="list-title">Danh sách</h3>
        <hr>
        @foreach ($data as $item)
            <div class="list-interview col-md-12" style="width: 30rem; padding-top: 24px">
                <div class="body col-md-8" style="border-right: solid 1px">
                    <h4 class="card-title">{{ $item->title }}</h4>
                    <h6 class="subtitle mb-4 text-muted">{{ \Carbon\Carbon::parse($item->start)->format('d/m/Y') }}</h6>
                    <p class="card-text">{{ $item->note }}</p>
                </div>
                <div class="button col-md-2">
                    <a href="{{ route('create.email') }}" class="btn-send-email"><span
                            class="fa fa-envelope-o"></span></a>
                    <hr>
                    <a href=""><span class="fa fa-trash-o"></span></a>
                </div>
            </div>
            <hr>
        @endforeach
        <br>
    </div>
</div>
{{-- start modal --}}
<div class="clearfix"></div>
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <label for="exampleFormControlTextarea1">Người tham dự :</label>
                        <br>
                        <select name="admins[]" id="slim-multi-select" multiple="multiple" @error('admin') is-invalid @enderror>
                            @foreach ($dataAdmin as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                        @error('admin')
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

            {{--
        </div>
    </div> --}}
    {{-- Modal --}}
    <div class="clearfix"></div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Categories Manage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="recipient-name">
                            <span class="error-form text-danger"></span>
                        </div>
                        <button type="button" class="btn btn-primary btn-add-location">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
