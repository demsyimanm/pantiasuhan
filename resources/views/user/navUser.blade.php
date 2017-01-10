<nav class="navbar navbar-default">
<!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right link-effect">
        <li><a href="{{url('/')}}">Home </a></li>
        <li><a href="{{url('user/artikel')}}">Artikel / Berita</a></li>
        <li><a href="{{url('user/video')}}">Video</a></li>
        <li><a href="{{url('user/schedule')}}">Jadwal Kegiatan</a></li>
        <li><a onclick="login()">Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>