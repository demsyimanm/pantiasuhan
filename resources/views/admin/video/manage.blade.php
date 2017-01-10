@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="file video outline icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Video
	  	</div>
	  </h1>
	</div>
  <div style="padding-top:3%;padding-bottom:3%">
	  <a class="ui icon teal button" href="{{URL::to('video/add')}}">
		<i class="plus icon"></i>
		Tambah Video
	  </a>
  </div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="20%" style="text-align:center">Judul</th>
		        <th width="20%" style="text-align:center">Link</th>
	        	<th width="25%" style="text-align:center">Video</th>
            <th width="10%" style="text-align:center">Tanggal</th>
	        	<th width="20%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($videos as $video)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td>{{$video->title}}</td>
		      		<td><a href="{{$video->link}}">{{$video->link}}</a></td>
		            <td><center><iframe width="210" height="172" src="{{$video->link}}"></iframe></center></td>
		            <?php
		                $date = DateTime::createFromFormat('Y-m-d H:i:s', $video->date);
		                $date = $date->format('d-M-Y | H:i');
		              ?>
		      		<td>{{$date}}</td>
		      		<td>
				      	<center>
					      	<a class="ui icon blue button" href="{{ URL::to('video/edit/'.$video->id) }}">
					        	<i class="pencil icon"></i>
					        	Edit
					      	</a>

					      	<button class="ui icon test red button del" onclick="dele('{{URL::to('video/remove/'.$video->id) }}')">
					        	<i class="trash icon"></i>
					        	Hapus
					      	</button>

				      	</center>
			      	</td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>
	  </div>
  </div>
</div>

<div id="modaldiv" class="ui small basic test modal" >
  <div class="ui icon header">
  	<i class="trash icon"></i>
  	Hapus Video
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus Video ini?</p></center>
  </div>
  <div class="actions">
  	<div class="ui red basic cancel inverted button">
    	<i class="remove icon"></i>
    	No
  	</div>
  	<a class="ui green ok inverted button button_modal">
    	<i class="checkmark icon"></i>
    	Yes
  	</a>
   </div>
</div>

<script type="text/javascript">
	function dele(id){
        $('#modaldiv').modal('show');
        $('.button_modal').attr({href:id});
	};
</script>
<script> 
  $(function () {
    $("#matkul").DataTable();
        });
</script>

<?php
if(Session::has('status') && Session::get('status') == 'success'){
      echo '<script language="javascript">';
      echo 'swal("Berhasil!", "Video berhasil disimpan!", "success");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'failed'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", Artikel gagal disimpan!", "error");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'deleted'){
      echo '<script language="javascript">';
      echo 'swal("Berhasil!", "Video berhasil dihapus!", "success");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'update-success'){
      echo '<script language="javascript">';
      echo 'swal("Berhasil!", "Video berhasil diupdate!", "success");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'update-failed'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", Artikel gagal diupdate!", "error");';
      echo '</script>';
}
?>
@endsection