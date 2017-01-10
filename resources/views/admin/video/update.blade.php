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
                  prompt : 'Harap isi Judul Video'
                }
              ]
            },
            link: {
              identifier  : 'link',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Harap isi Link Video'
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
    <i class="file video outline icon" style="padding-bottom:5%"></i>
    <div class="content" >
      Update Video
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
                    <input type="text" name="title" placeholder="Judul" value="{{$video->title}}">
                  </div>
                </div>
              </div>
              <div class="sixteen wide field">
                <div class="inline fields">
                  <div class="two wide field">
                    <label>Link Video (Youtube)</label>
                  </div>
                  <div class="fourteen wide field">
                    <input type="text" name="link" placeholder="Link" value="{{$video->link}}">
                  </div>
                </div>
              </div>
              <div style="margin-top:5%">
                <center><iframe width="420" height="345" src="{{$video->link}}"></iframe></center>
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