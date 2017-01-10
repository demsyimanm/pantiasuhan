
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--script src="{{url('assets/pecuniary/web/js/jquery.min.js')}}"></script-->
    <!--<script src="{{url('assets/pecuniary/web/js/bootstrap.min.js')}}"></script>-->
    <script src="{{URL::to('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/pecuniary/web/js/numscroller-1.0.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/pecuniary/web/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/pecuniary/web/js/easing.js')}}"></script>
     <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".scroll").click(function(event){     
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
                });
            });
        </script>
        <!--script-->
    <script src="{{url('assets/pecuniary/web/js/responsiveslides.min.js')}}"></script>
     <script>
        $(function () {
          $("#slider").responsiveSlides({
            auto: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            pager: true,
          });
        });
      </script>
      <!-- swipe box js -->
            <script src="{{url('assets/pecuniary/web/js/jquery.swipebox.min.js')}}"></script> 
                <script type="text/javascript">
                    jQuery(function($) {
                    $(".swipebox").swipebox();
                    });
            </script>

        <!-- //swipe box js -->
    <script src="{{URL::to('assets/js/jquery.min.js')}}"></script>
    <script src="{{URL::to('assets/Semantic/dist/semantic.js')}}"></script>
    <script src="{{URL::to('assets/js/iframe-content.js')}}"></script>
    <script src="{{URL::to('assets/Semantic/components/form.js')}}"></script>
    <script src="{{URL::to('assets/Semantic/components/popup.js')}}"></script>
    <script src="{{URL::to('assets/Semantic/components/transition.js')}}"></script>
    <script src="{{URL::to('assets/Semantic/components/dropdown.js')}}"></script>
    <script src="{{URL::to('assets/Semantic/components/modal.js')}}"></script>
    <!--script src="{{URL::to('assets/bootstrap/js/bootstrap.js')}}"></script-->
    <script src="{{URL::to('assets/Semantic/components/tab.js')}}"></script>
    <script src="{{URL::to('assets/plugin/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::to('assets/plugin/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{URL::to('assets/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{URL::to('assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ URL::to('assets/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL::to('assets/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

    