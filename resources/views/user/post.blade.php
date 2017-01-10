@extends ('user.masterVideo')
@section('banner')
	<div class="banner-info">
		<div class="wow fadeInRight animated" data-wow-delay=".5s" style="margin-top:-15%">
		</div>
		<div style="padding-bottom:10%">
			<h1 class="wow fadeInRight animated" data-wow-delay=".5s" >Berita / Artikel</h1>
			<p class="wow fadeInRight animated" data-wow-delay=".5s">Panti Pesantren Muhammadiyah Cabang Tambaksari</p>
		</div>
	</div>
@endsection
@section('content')
	<div class="gallery">
			<div class="" style="padding:5%">
				<div class="gallery-grids">
					@foreach($posts as $post)
						<div class="col-md-4 journal-grid" style="padding:3%">
							<?php
								if(file_exists($post->poster))
								{
									?>
									<center><a href="{{url('user/artikel/'.$post->id)}}" class="new-gri" data-toggle="modal"><img src="/panti/{{$post->poster}}" class="img-responsive" style="height:300px;width:300px" alt="" /></a></center>
									<?php
								}
								else
								{
									?>
									<center><a href="{{url('user/artikel/'.$post->id)}}" class="new-gri" data-toggle="modal"><img src="/panti/image/logo2.png" class="img-responsive" style="height:300px;width:300px" alt="" /></a></center>
									<?php
								}

							?>
							<div style="height:300px">
								<div class="jou-text col-md-12">
									<div class="" style="color:white">
										<?php
											$date = DateTime::createFromFormat('Y-m-d H:i:s', $post->date);
					                		$tgl = $date->format('F d, Y');
										?>
									</div>
									<div class="jou-right" style="margin-bottom:5%">
										<h4><a href="{{url('user/artikel/'.$post->id)}}" class="new-gri"><?php echo substr(strip_tags ($post->name), 0,90) ?> </a></h4>
										<div>
											<span style="">Published on <b>{{$tgl}}</b></span>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<p class="jour-text" style="padding-left:4%"><?php echo substr(strip_tags ($post->description), 0,180) ?><b><span><a href="{{url('user/artikel/'.$post->id)}}"> read more ...</a></span></b></p>
							</div>
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