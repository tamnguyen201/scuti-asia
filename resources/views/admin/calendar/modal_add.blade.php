                <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.js"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.26.0/slimselect.min.css" rel="stylesheet"></link>
                <script>
                    new SlimSelect({
                        select: '#slim-multi-select'
                        })
                </script>
                <form>
                    @csrf
                    
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
                            <input name="title" type="text" value="{{ old('title') }}">
                            <span class="error-form text-danger"></span>
                        </div>
                        <div class="form-calendar form-group col-md-6">
                            <label for="exampleFormControlTextarea1">@lang('custom.calendar.color')* :</label>
                            <br>
                            <input name="color" type="color">
                            <span class="error-form text-danger"></span>
                        </div>
                    </div>
                    <div class="form-calendar form-group col-md-12">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.start')* :</label>
                        <br>
                        <input name="start" type="datetime-local" style="display: block">
                        <span class="error-form text-danger"></span>
                    </div>
                    <div class="form-calendar form-group col-md-12">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.end')* :</label>
                        <br>
                        <input name="end" type="datetime-local" style="display: block">
                        <span class="error-form text-danger"></span>
                    </div>
                    <div class="form-calendar form-group col-md-12">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.attender') :</label>
                        <br>
                        <select name="admins[]" id="slim-multi-select" multiple="multiple">
                            @foreach ($dataAdmin as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                        <span class="error-form text-danger"></span>
                    </div>
                    <div class="form-calendar form-group col-md-12">
                        <label for="exampleFormControlTextarea1">@lang('custom.calendar.note') :</label>
                        <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <span class="error-form text-danger"></span>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-add-event"><span class="fa fa-plus"></span>
                            @lang('custom.calendar.btn_add')</button>
                    </div>
                </form>