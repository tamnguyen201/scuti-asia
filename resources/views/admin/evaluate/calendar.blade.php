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
@include('admin.calendar.modal_add')
