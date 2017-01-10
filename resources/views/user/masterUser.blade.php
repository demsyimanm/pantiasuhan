<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@include('header')
@include('footer')
</head>
<body>
		<div class="banner">
			<div class="container">
				<div class="navigation wow fadeInLeft animated" data-wow-delay=".5s">
					@include('user.navUser')
				</div>
				@yield('banner')	
			</div>
		</div>
		<div class="content">
			@yield('content')
		</div>
		<div class="footer" id="contact">
			@include('user.footerUser')
		</div>
			<script type="text/javascript">
				$(document).ready(function() {
					$().UItoTop({ easingType: 'easeOutQuart' });
					/*$('#myModal1').modal('show');*/
					
				});
			</script>
			<a href="#" id="home" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</body>
</html>