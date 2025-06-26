<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">

<a href="#" id="btnDarkMode" data-toggle="tooltip" data-placement="top" title="Dark Mode">
  <span class="glyphicon glyphicon-adjust" aria-hidden="true"></span>
</a>

<a href="#" id="btnFullscreen" data-toggle="tooltip" data-placement="top" title="FullScreen">
  <span id="fullscreenIcon" class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
</a>
<a href="{{ url('/lockscreen') }}" data-toggle="tooltip" data-placement="top"
  title="Bloquear pantalla"> <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
</a>

<form id="logout-form-bottom" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>

<a data-toggle="tooltip" data-placement="top" title="Logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-bottom').submit();">
  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
</a>
</div>
<!-- /menu footer buttons -->





<!-- Fullscreen -->
<script src="{{ asset('js/fullscreen.js') }}"></script>
 <!-- jQuery -->
 <script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
 <!-- Bootstrap -->
 <script src="{{ asset('dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
 <!-- FastClick -->
 <script src="{{ asset('dashboard/vendors/fastclick/lib/fastclick.js') }}"></script>
 <!-- NProgress -->
 <script src="{{ asset('dashboard/vendors/nprogress/nprogress.js') }}"></script>
 <!-- Chart.js -->
 <script src="{{ asset('dashboard/vendors/Chart.js/dist/Chart.min.js') }}"></script>
 <!-- gauge.js -->
 <script src="{{ asset('dashboard/vendors/gauge.js/dist/gauge.min.js') }}"></script>
 <!-- bootstrap-progressbar -->
 <script src="{{ asset('dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
 <!-- iCheck -->
 <script src="{{ asset('dashboard/vendors/iCheck/icheck.min.js') }}"></script>
 <!-- Skycons -->
 <script src="{{ asset('dashboard/vendors/skycons/skycons.js') }}"></script>
 <!-- Flot -->
 <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.pie.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.time.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.stack.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/Flot/jquery.flot.resize.js') }}"></script>
 <!-- Flot plugins -->
 <script src="{{ asset('dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/flot.curvedlines/curvedLines.js') }}"></script>
 <!-- DateJS -->
 <script src="{{ asset('dashboard/vendors/DateJS/build/date.js') }}"></script>
 <!-- JQVMap -->
 <script src="{{ asset('dashboard/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
 <!-- bootstrap-daterangepicker -->
 <script src="{{ asset('dashboard/vendors/moment/min/moment.min.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
 <!-- Custom Theme Scripts -->
 <script src="{{ asset('dashboard/build/js/custom.js') }}"></script>
 <!-- DarkMode -->
 <script src="{{ asset('js/dark-mode.js') }}"></script>
 