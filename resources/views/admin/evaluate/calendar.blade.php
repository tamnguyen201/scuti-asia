<div>
    <div class="col-md-12">
        
        <div class="panel-body">
            <a href="{{ route('create.event', $dataUser->id) }}" id="btn-add" hidden></a>
            <div id="full-calendar">
                {!! $calendar->calendar() !!}
            </div>
        </div>
    </div>
</div>

{{-- start modal --}}
<div class="clearfix"></div>
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
                {{-- @include('admin.calendar.modal_add') --}}
            </div>


