<div class="row">
    <div class="col-md-8">
        <div class="panel-body">
            {!! $calendar->calendar() !!}
        </div>
    </div>
    <div class="panel-body col-md-4">
        <h3 class="list-title"><span class="fa fa-list-alt"></span> Danh sách</h3>
        <hr>
        @foreach ($data as $item)
            <div class="list-interview col-md-12" style="width: 30rem">
                <div class="body col-md-12">
                    <h4 class="card-title">{{ $item->title }}</h4>
                    <h6 class="subtitle mb-4 text-muted">{{ \Carbon\Carbon::parse($item->start)->format('d/m/Y') }}</h6>
                </div>
                <div class="button col-md-8" style="float: right">
                    <form action="{{ route('send.event.email') }}" method="POST" class="form-delete-{{$item->id}}" style="display: inline-block">
                        @csrf
                        <input name="email" type="text" value="{{ $item->user->email }}" hidden>
                        <input name="name" type="text" value="{{ $item->user->name }}" hidden>
                        <input name="time" type="text" value="{{ \Carbon\Carbon::parse($item->start)->format('d/m/Y - H:i:s') }}" hidden>
                        <button class="btn btn-warning btn-send-email" style="padding-right: 15px" idEmail={{$item->id}}><span
                            class="fa fa-envelope-o"></span></button>
                    </form>
                    {{-- <a href=""><span class="fa fa-trash-o"></span></a> --}}
                    <form action="{{route('event.delete', $item->id)}}" method="post" class="form-delete-{{$item->id}}" style="display: inline">
                        @csrf
                        <button class="btn btn-danger text-light delete-confirm" idDelete={{$item->id}}><em class="fas fa-trash-alt"></em></button>
                    </form>
                </div>
            </div>
        @endforeach
        <br>
    </div>
</div>
{{-- start modal --}}

<div class="clearfix"></div>
@include('admin.calendar.modal_add')


