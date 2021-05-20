<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href="{{ asset('fullcalendar-5.6.0/lib/main.css') }}" rel='stylesheet' />
<title>Calendário</title>
<script src='https://github.com/mozilla-comm/ical.js/releases/download/v1.4.0/ical.js'></script>
<script src='../packages/icalendar/main.global.js'></script>
<link href="{{ asset('css/fullcalendar.css') }}" rel='stylesheet' />
<script src="{{ asset('fullcalendar-5.6.0/lib/main.js') }}"></script>
</head>
<body>

  <div id='script-warning'>
    <code>ics/feed.ics</code> must be servable
  </div>

  <div id='loading'>loading...</div>

  <div id='calendar' data-route-load-events="{{ route('admin.calendar') }}"></div>

<script type="{{ asset('fullcalendar-5.6.0/lib/locales/pt-br.js') }}"></script>

<script type="{{ asset('js/fullcalendar.js') }}"></script>
<script type="{{ asset('js/script.js') }}"></script>

</body>
</html>