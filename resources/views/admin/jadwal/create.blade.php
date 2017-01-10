@extends ('admin.masterAdmin')
@section ('content')
<meta charset="utf-8">
<script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            title: {
              identifier  : 'title',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Harap isi Judul Jadwal'
                }
              ]
            },
            start: {
              identifier  : 'start',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Harap isi tanggal mulai jadwal'
                }
              ]
            },
            end: {
              identifier  : 'end',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Harap isi tanggal selesai jadwal'
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
    <i class="calendar icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Tambah Jadwal
    </div>
  </h1>
  <br>
  <div class="ui grid stackable" style="margin-bottom:10%;">
    <div  class="sixteen wide column">
      <div class="ui blue segment" style="padding-bottom:5%">
        <form class="ui form" action="" method="post" >
          <div visible>
            <div id="form1" >
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Judul</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="text" name="title" placeholder="Judul">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Start</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="text" name="start" placeholder="Start" id="datepicker1" readonly="">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>End</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="text" name="end" placeholder="End" id="datepicker2" readonly="">
                  </div>
                </div>
              </div>
              <!-- <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Deskripsi</label>
                  </div>
                  <div class="fourteen wide field">
                    <textarea name="description" placeholder="Deskripsi"></textarea>
                  </div>
                </div>
              </div> -->
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
<script type="text/javascript">
  $('#datepicker1').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
  $('#datepicker2').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
</script>

<!-- <script src="{{URL::to('assets/js/moment.min.js')}}"></script>
<script src="{{URL::to('assets/js/angular.min.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/dist/ng-flat-datepicker.js')}}"></script>
<script src="{{URL::to('assets/plugin/datepicker/demo/js/app.js')}}"></script> -->

@endsection