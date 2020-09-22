<div id="interview-process">
<div class="col-md-8">
    <fieldset>
        <div class="form-card">
            <div class="col-md-6">
                <h3>@lang('custom.evaluate.candidate_evaluate') :</h3>
            </div>
            <div class="col-md-5">
                <h3 class="steps">@lang('custom.evaluate.step') 3 - 4</h3>
            </div>
        </div>
        @include('admin.evaluate.calendar')
    </fieldset>
</div>
<div class="list col-md-4">
    <fieldset>
    <h3 class="list-title"><span class="fa fa-list-alt"></span> Danh sách :</h3>
    <hr>
    @foreach ($data as $item)
        <div class="list-interview col-md-12" style="width: 30rem; padding-bottom:15px; display:inline-block">
            <div class="body" style="text-align:center; display:block">
                <h4 class="card-title">{{ $item->title }}</h4>
                <h6 class="subtitle mb-4 text-muted">{{ \Carbon\Carbon::parse($item->start)->format('d/m/Y') }}</h6>
            </div>
            <div class="button col-md-12" style="float: right">
                <div class="col-md-9 btn-email" style="display: inline-block">
                    @if ($item->email_status ==1)
                        <span class="label label-success email-success">Đã gửi email</span>
                    @else
                        <form action="{{ route('send.event.email') }}" method="POST" class="form-email-{{$item->id}}" style="display: inline-block; float: right">
                            @csrf
                            <input name="event_id" type="text" value="{{ $item->id }}" hidden>
                            <input name="email" type="text" value="{{ $item->user->email }}" hidden>
                            <input name="name" type="text" value="{{ $item->user->name }}" hidden>
                            <input name="time" type="text" value="{{ \Carbon\Carbon::parse($item->start)->format('d/m/Y - H:i') }}" hidden>
                            <input name="job" type="text" value="{{ $jobById->name }}" hidden>
                            <button class="btn btn-warning btn-send-email" style="padding-right: 15px" idEmail={{$item->id}}><span
                                class="fa fa-envelope-o"></span></button>
                        </form>
                    @endif
                </div>
                <div class="col-md-3" style="display: inline-block">
                    <form action="{{route('event.delete', $item->id)}}" method="post" class="form-delete-{{$item->id}}" style="display: inline-block; float:right">
                        @csrf
                        <button class="btn btn-danger text-light delete-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <br>
</fieldset>
</div>
</div>