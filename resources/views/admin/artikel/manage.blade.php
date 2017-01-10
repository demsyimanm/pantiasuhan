@extends ('admin.masterAdmin')
@section ('content')


<div class="ui text" style="margin-bottom:10%;padding-left:5%;padding-right:5%">
	<div style="padding-top:3%; padding bottom:0px; padding-top:0px">
	  <h1 class="ui dividing header">
	  	<i class="write icon" style="padding-bottom:5%"></i>
	  	<div class="content">
	    	Artikel / Berita
	  	</div>
	  </h1>
	</div>
  <div style="padding-top:3%;padding-bottom:3%">
	  <a class="ui icon teal button" href="{{URL::to('artikel/add')}}">
		<i class="plus icon"></i>
		Tambah Artikel
	  </a>
  </div>
  <div style="padding:0%;padding-top:0px">
	  <div class="ui blue segment" style="height:80%">
		<table class="ui celled table segment table-hover" id="matkul">
		  <thead>
		    <tr>
		        <th width="5%" style="text-align:center">No</th>
		        <th width="25%" style="text-align:center">Judul</th>
		        <th width="25%" style="text-align:center">Tanggal</th>
	        	<th width="25%" style="text-align:center">Poster</th>
	        	<th width="20%" style="text-align:center">Action</th>
	      	</tr>
	      </thead>
		  <tbody>
		  	<?php $i = 1?>
		  	@foreach ($posts as $post)
			    <tr>
			      	<td class="center"><?php echo $i++ ?></td>
		      		<td>{{$post->name}}</td>
              <?php
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $post->date);
                $date = $date->format('d-M-Y | H:i');
              ?>
		      		<td>{{$date}}</td>
	      			<td style="text-align:center"><img src="{{url($post->poster)}}" style="width:30%"></td>
		      		<td>
				      	<center>
					      	<a class="ui icon blue button" href="{{ URL::to('artikel/edit/'.$post->id) }}">
					        	<i class="pencil icon"></i>
					        	Edit
					      	</a>

					      	<button class="ui icon test red button del" onclick="dele('{{URL::to('artikel/remove/'.$post->id) }}')">
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
  	Hapus Artikel
  </div>
  <div class="content">
  	<center><p>Apakah Anda yakin ingin menghapus Artikel ini?</p></center>
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
      echo 'swal("Berhasil!", "Artikel berhasil disimpan!", "success");';
      echo '</script>';
}

else if(Session::has('status') && Session::get('status') == 'not-image'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", "Poster yang Anda upload bukan image!", "error");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'too-large'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", "Ukuran poster Terlalu besar!", "error");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'wrong-format'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", "Poster harus berformat .jpg, .png atau .jpeg", "error");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'failed-upload'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", "Poster gagal diupload", "error");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'failed'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", Artikel gagal disimpan!", "error");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'deleted'){
      echo '<script language="javascript">';
      echo 'swal("Berhasil!", "Artikel berhasil dihapus!", "success");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'update-success'){
      echo '<script language="javascript">';
      echo 'swal("Berhasil!", "Artikel berhasil diupdate!", "success");';
      echo '</script>';
}
else if(Session::has('status') && Session::get('status') == 'update-failed'){
      echo '<script language="javascript">';
      echo 'swal("Gagal!", Artikel gagal diupdate!", "error");';
      echo '</script>';
}
?>
@endsection