<!DOCTYPE html>
<html>
<head>
    <title>Reservas no Calendário</title>
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>
<body>
  
<div class="container">
    <h1>Calendário das Reservas</h1>
    <div id='calendar'></div>
</div>
   
<script>
$(document).ready(function () {
   
var siteUrl = "{{ url('/') }}";
  
var calendar = $('#calendar').fullCalendar({
    events: siteUrl + "/admin/calendar",
    eventRender: function (event, element, view) {
        if (event.allDay === 'true') {
            event.allDay = true;
        } else {
            event.allDay = false;
        }
    },
    selectable: true,
    selectHelper: true
 });
 
});
 
</script>
</body>
</html>