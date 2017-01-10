@extends ('user.masterVideo')
@section('banner')
	<div class="banner-info">
		<div class="wow fadeInRight animated" data-wow-delay=".5s" style="margin-top:-15%">
		</div>
		<div style="padding-bottom:10%">
			<h1 class="wow fadeInRight animated" data-wow-delay=".5s" >Video</h1>
			<p class="wow fadeInRight animated" data-wow-delay=".5s">Panti Pesantren Muhammadiyah Cabang Tambaksari</p>
		</div>
	</div>
@endsection
@section('content')
	<div class="gallery">
			<div class="" style="padding:5%">
				<div class="gallery-grids">
					@foreach($videos as $video)
					<div class="col-md-4 gal-left" style="margin-bottom:5%">
						<center>
							<iframe width="90%" height="400" src="{{$video->link}}" frameborder="0" allowfullscreen></iframe>
							<div style="margin-top:2%;height:60px">
								<h3><?php echo substr(strip_tags ($video->title), 0,100) ?> </h3>
								<?php
									$date = DateTime::createFromFormat('Y-m-d H:i:s', $video->date);
		                			$date = $date->format('F d, Y');
								?>
								<p style="margin-bottom:-150px">{{$date}}</p>
							</div>
						</center>
					</div>
					@endforeach
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
@endsection