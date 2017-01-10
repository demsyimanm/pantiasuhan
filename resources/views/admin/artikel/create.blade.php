@extends ('admin.masterAdmin')
@section ('content')
<meta charset="utf-8">
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            name: {
              identifier  : 'name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Harap isi Judul Artikel'
                }
              ]
            },
            poster: {
              identifier  : 'poster',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Harap isi poster untuk artikel'
                }
              ]
            },
          }
        })
      ;
    })
  ;
  </script>
<div style="padding-left:20%;padding-right:20%;">
  <h1 class="ui dividing header">
    <i class="write icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Tambah Artikel / Berita
    </div>
  </h1>
  <br>
  <div class="ui grid stackable" style="margin-bottom:10%;">
    <div  class="sixteen wide column">
      <div class="ui blue segment" style="padding-bottom:5%">
        <form class="ui form" action="" method="post" enctype="multipart/form-data">
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Judul</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="text" name="name" placeholder="Judul">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Poster</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="file" name="poster">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Konten</label>
                  </div>
                  <div class="fourteen wide field">
                    <textarea name="description" placholder="Konten"></textarea>
                  </div>
                </div>
              </div>
              {{csrf_field()}}
              <div class="ui error message"></div>
              <br>
              <button class="ui icon green button" type="submit" style="float:right">
                Simpan
                <i class="save icon"></i>
              </button>
            </div>
          </div>
        </form>
        <br>
      </div>
    </div>
  </div>
</div>
  
<script type="text/javascript">
  $('select.dropdown')
  .dropdown(); 
</script>
<script>
    CKEDITOR.replace( 'description',
      {
        width: '100%'
      });
</script>

<!-- <script src="{{URL::to('assets/js/moment.min.js')}}"></script>
<script src="{{URL::to('assets/js/angular.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script> -->

@endsection