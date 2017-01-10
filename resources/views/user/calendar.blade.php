@extends ('user.masterVideo')
@section('banner')
	<link rel='stylesheet' href="{{url('assets/plugin/calendar/fullcalendar.css')}}" />
	<script src="{{url('assets/plugin/calendar/lib/moment.min.js')}}"></script>
	<script src="{{url('assets/plugin/calendar/fullcalendar.js')}}"></script>
	<div class="banner-info">
		<div class="wow fadeInRight animated" data-wow-delay=".5s" style="margin-top:-15%">
		</div>
		<div style="padding-bottom:10%">
			<h1 class="wow fadeInRight animated" data-wow-delay=".5s" >Jadwal Kegiatan</h1>
			<p class="wow fadeInRight animated" data-wow-delay=".5s">Panti Pesantren Muhammadiyah Cabang Tambaksari</p>
		</div>
	</div>
@endsection
@section('content')
	<div class="gallery" style="">
			<div class="" style="padding-left:10%;padding-right:10%;padding-bottom:10%;">
				<div class="">
					<center>
						<div id='calendar'></div>
					</center>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--count-->
	<div class="modal" id="myModal1" tabindex="100" data-toggle="modal" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-info">
				<div class="modal-body">
					<div class="news-gr">
						<h3 class="tittle">Login</h3>
						<form class="ui form" action="{{url('/login')}}" method="post" id="loginForm">
							<div class="sixteen wide field">
			                <div class="inline fields">
			                  <div class="three wide field">
			                    <label>Username</label>
			                  </div>
			                  <div class="thirteen wide field">
			                    <input type="text" name="username" placeholder="username" id="username">
			                  </div>
			                </div>
			              </div>
			              <div class="sixteen wide field">
			                <div class="inline fields">
			                  <div class="three wide field">
			                    <label>Password</label>
			                  </div>
			                  <div class="thirteen wide field">
			                    <input type="password" name="password" placeholder="Password" id="password">
			                  </div>
			                </div>
			              </div>
			              {{csrf_field()}}
						</form>
					</div>
					<div class="actions right" style="padding:2%;">
					  	<div class="ui red cancel button">
					    	<i class="remove icon"></i>
					    	Cancel
					  	</div>
					  	<button class="ui green ok button button_modal" id="buttonSubmit">
					    	<i class="checkmark icon"></i>
					    	Login
					  	</button>
				   </div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function login()
		{
			$('#myModal1').modal('setting', 'closable', false).modal('show');
		};
	</script>
	<script type="text/javascript">
		$('#buttonSubmit').click(function (e){
	    if ($.trim($('#username').val()) != '' && $.trim($('#password').val()) != '')
	    {
	      $('#loginForm').submit();
	      console.log("masuk");

	      
	    }
	    else
	    {
	      return false;
	    }
	  });
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#calendar').fullCalendar({
		    	header: {
				left: '',
				center: 'title',
				right: 'prev,next today month,basicWeek,basicDay'
				},
				navLinks: true, // can click day/week names to navigate views
				editable: true,
				eventLimit: true, // allow "more" link when too many events
		    	events: [
		    		@foreach($scheds as $sched)

			        {
			        	<?php 
		    			$date = date_create($sched->end);
		    			date_add($date, date_interval_create_from_date_string('1 days'));
		    			$end =  date_format($date, 'Y-m-d');
		    		?>
			            title  : '{{$sched->title}}',
			            start  : '{{$sched->start}}',
			            end    : '{{$end}}',
			            allDay : true

			        },
			        @endforeach
			    ]
		    })

		});
	</script>
@endsection