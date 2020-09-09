{{-- @extends('admin.layout.layout')
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
  <link rel="stylesheet" href="{{ asset('adminAsset/css/calendar.css') }}">
@endsection --}}
{{-- @section('content') --}}
<div class="row">
  <div class="col-md-8">
    <div class="panel-body">
      {!! $calendar->calendar() !!}
    </div>  
</div>
<div class="panel-body col-md-4">
  <h3 class="list-title">Danh sach</h3>
  <hr>
  @foreach ($data as $item)
  <div class="card card-interview" style="width: 18rem;">
    <div class="card-body">
      <h4 class="card-title">{{ $item->title }}</h4>
      <h6 class="card-subtitle mb-2 text-muted">{{ $item->start }}</h6>
      <p class="card-text">{{ $item->note }}</p>
      {{-- <a href="#" class="card-link col-md-6">Delete</a>
      <a href="#" class="card-link col-md-6">Send Email</a> --}}
    </div>
  </div>
  <hr>
  @endforeach
</div>
</div>
    
      {{-- day click dialog --}}
        <div id="dialog" style="display:none">
          <div id="dialog-body">
            <form action="{{ url('admin/evaluate/process/calendar/create') }}" method="POST">
              @csrf
              @method('POST')
              <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">@lang('custom.calendar.name') :</label>
                <br>
                <input name="id" type="text" value="{{ $dataUser->id }}" hidden>
                <input name="process_id" type="text" value="{{ $processById->id }}" hidden>
                <p>{{ $dataUser->name }}</p>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">@lang('custom.calendar.email') :</label>
                <br>
                <p>{{ $dataUser->email }}</p>
              </div>
                <div class="form-group col-md-12">
                  <label for="exampleFormControlTextarea1">@lang('custom.calendar.title') :</label>
                  <br>
                  <input name="title" type="text">
                </div>
                <div class="form-group col-md-12">
                  <label for="exampleFormControlTextarea1">@lang('custom.calendar.color') :</label>
                  <br>
                  <input name="color" type="color">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleFormControlTextarea1">@lang('custom.calendar.start') :</label>
                  <br>
                  <input name="start" type="datetime-local">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleFormControlTextarea1">@lang('custom.calendar.end') :</label>
                  <br>
                  <input name="end" type="datetime-local">
                </div>
                <div class="form-group col-md-12">
                      <label for="exampleFormControlTextarea1">@lang('custom.calendar.note') :</label>
                      <textarea name="note" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary btn-add-event">@lang('custom.button.submit')</button>
                </div>
            </form>
          </div>
        </div>
      {{-- end day click dialog --}}
{{-- @endsection --}}
{{-- @section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

      {!! $calendar->script() !!}
@endsection
</html> --}}
