<?php //pr($authUser);die; ?>
<?php use Cake\Routing\Router; ?>

<div class="col-md-12">
    <h2>Minha Agenda</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
			<div id="calendar"></div>
        </div>
    </div>
</div>



<script type="text/javascript">
	$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
    	header: { center: 'month,agendaWeek' },
    	weekends: false,
		eventSources: [
		    {
		      url: '<?= Router::url('/', true) ?>api/getconsultationsdoctor',
		      type: 'POST',
		      data: {
		        doctor_id: '<?=$authUser['id']?>',
		      },
		      error: function() {
		        alert('there was an error while fetching events!');
		      },
		      color: 'yellow',   
		      textColor: 'black' 
		    }
		  ],
		  eventClick: function(event) {
		    if (event.url) {
		      window.open(event.url);
		      return false;
		    }
		  }
    })

});
</script>