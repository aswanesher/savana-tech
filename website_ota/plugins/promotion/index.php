<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar.css' rel='stylesheet' />
<script src='moment.min.js'></script>
<script src='jquery.min.js'></script>
<script src='fullcalendar.js'></script>
<?PHP
	$now	= date("Y-m-d");
?>
<script>

	$(document).ready(function() {
		 
			 var date = new Date();
			 var d = date.getDate();
			 var m = date.getMonth();
			 var y = date.getFullYear();
			 
			 var calendar = $('#calendar').fullCalendar({
			 header: {
				left: 'prev',
				right: 'next',
				center: 'title',
			},
			defaultDate: '<?PHP echo $now?>',
			 editable: true,
			 events: "../../getpromotion.php",
				selectable: false,
				selectHelper: true,
				select: function(start, end, allDay) {
			 var title = prompt('Event Title:');
				 if (title) {
				 start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
				 end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
				 calendar.fullCalendar('renderEvent',
				 {
					 title: title,
					 start: start,
					 end: end,
					 allDay: allDay
				},
					true // make the event "stick"
			 );
			 }
				calendar.fullCalendar('unselect');
			 }
			 });
		 
		 });

</script>
<style>
	#calendar {
		max-width: 1000px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
