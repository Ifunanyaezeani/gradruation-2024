<div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: @json($events),
        });
        calendar.render();
    });
</script>
<div class="page-content-wrapper p-xxl-4 bg-transparent">

	<!-- Title -->
	<div class="row">
		<div class="col-12 mb-2">
			<div class="d-sm-flex justify-content-between align-items-center">
				<h1 class="h3">Events</h1>
			</div>
		</div>
	</div>
    <div id="calendar"></div>
</div>
</div>
