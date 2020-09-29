@extends('admin.layout.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
@endsection
@section('content')
    <div class="col-md-8">
        <div class="response"></div>
        <div id='calendar'></div>  
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Edit Appointment</h4>
    
                    Start time:
                    <br />
                    <input type="text" class="form-control" name="start_time" id="start_time">
    
                    End time:
                    <br />
                    <input type="text" class="form-control" name="finish_time" id="finish_time">
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-primary" id="appointment_update" value="Save">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                defaultView: 'agendaWeek',
                events : [
                    @foreach($appointments as $appointment)
                    {
                        title : '{{ $appointment->client->first_name . ' ' . $appointment->client->last_name }}',
                        start : '{{ $appointment->start_time }}',
                        @if ($appointment->finish_time)
                                end: '{{ $appointment->finish_time }}',
                        @endif
                    },
                    @endforeach
                ],
                eventClick: function(calEvent, jsEvent, view) {
                    $('#start_time').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#finish_time').val(moment(calEvent.end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#editModal').modal();
                }
            });
        });
    </script>
@endsection