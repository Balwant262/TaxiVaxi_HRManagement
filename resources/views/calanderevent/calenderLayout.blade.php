
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" >
                <h4>Edit Event</h4>
                <input type="hidden" name="id" id="event_id" value="" />
                Event Name:
                <br />
                <input type="text" class="form-control" name="event_name" id="event_name">

                Event Description:
                <br />
                <input type="text" class="form-control" name="event_description" id="event_description">

                Event Date time:
                <br />
                <input type="text" class="form-control datetimepicker1" name="start_time" id="start_time">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
                    <input type="button" class="btn btn-primary" id="appointment_update" value="Save">
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->

<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@push('scripts')
   <script src="/assets/js/custom.js"></script>

@endpush
<script>
    $(document).ready(function() {
        var today = new Date();
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            defaultView: 'month',
            selectable: true,
            eventLimit: true,
            eventRender: function(eventObj, $el) {
                $el.popover({
                    title: eventObj.event_title,
                    content: eventObj.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                });
                },
            dayClick: function(date) {
                $('#event_description').val('');
                $('#event_name').val('');
                $('#editModal').modal();
                $('#start_time').val(moment(date).format('YYYY-MM-DD HH:mm:ss'));
                
            },
            events : [
                @foreach($calendar_details as $calendar_detail)
                {
                    id: '{{ $calendar_detail->id }}',
                    title : 'Event : {{ $calendar_detail->name}}',
                    event_name : '{{ $calendar_detail->name }}',
                    description : '{{ $calendar_detail->description }}',
                    start : '{{ $calendar_detail->task_date }}',
                    backgroundColor: '#2f8eb7',
                    borderColor: '#295db2',
                    textColor: 'white',
                    className: ["text-center font-weight-bold"],
                    end: '{{ $calendar_detail->task_date }}',
                    
                },
                @endforeach
                @foreach($absentEmployees as $absentEmployee)
                {
                    id:'21',
                    event_title : "Absent Employee",
                    title : '{{$absentEmployee->name}}',
                    description : '{{$absentEmployee->name}}',
                    start :  today,
                    end:  today,
                    backgroundColor: '#c45240',
                    borderColor: '#295db2',
                    textColor: 'white',
                    className: ["text-center font-weight-bold"],
                   
                },
                @endforeach
                
            ],
           
            eventClick: function(calEvent, jsEvent, view) {
                $('#event_id').val(calEvent._id);
                $('#start_time').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss'));
                $('#event_description').val(calEvent.description);
                $('#event_name').val(calEvent.event_name);
                $('#editModal').modal();
                }
        });

        $('#appointment_update').click(function(e) {
            
        e.preventDefault();
        var data = {
            _token: '{{ csrf_token() }}',
            id: $('#event_id').val(),
            name: $('#event_name').val(),
            description: $('#event_description').val(),
            task_date: $('#start_time').val(),
        };
        
        $.post('{{ route('update-events') }}', data, function( result ) {
            
            $('#calendar').fullCalendar('removeEvents', $('#event_id').val());
            
            $('#calendar').fullCalendar('renderEvent', {
                title: result.calendar_details.name + ' ' + result.calendar_details.description,
                start: result.calendar_details.task_date,
                event_name : result.calendar_details.name,
                description: result.calendar_details.description
            }, true);

            $('#editModal').modal('hide');
            });
        });



    });

   
</script>
