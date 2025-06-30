 
 </div> <!--  Pendinete de revisar -->
 <!-- footer content -->
        <footer class="d-flex justify-content-between">
          <div class="text-end">
            {{ config('app.title') }}
          </div>
          <div class="text-end">
            {{ config('app.name') }} - {{ date('Y') }}
          </div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <!-- Fullscreen -->

    <script src="{{ asset('js/fullscreen.js') }}"></script>


    <!-- jQuery -->
    {{-- <script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script> --}}
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

   

    <!-- DarkMode -->
    <script src="{{ asset('js/dark-mode.js') }}"></script>
	
    <!-- Datatables -->
    <script src="{{ asset('dashboard/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
  

  
    <!-- Parsley principal -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.3/parsley.min.js"></script> --}}
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    
    <!-- Traducción al español -->
    <script src="{{ asset('js/es.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.3/i18n/es.js"></script> --}}

    <!-- Activar idioma español -->
    <script>
      window.Parsley.addMessages('es', {
        defaultMessage: "Este valor parece ser inválido.",
        type: {
          email:        "Este valor debe ser un correo válido.",
          url:          "Este valor debe ser una URL válida.",
          number:       "Este valor debe ser un número.",
          integer:      "Este valor debe ser un número entero.",
          digits:       "Este valor debe ser dígitos.",
          alphanum:     "Este valor debe ser alfanumérico."
      },
        notblank:       "Este valor no debe estar en blanco.",
        required:       "Este campo es obligatorio.",
        pattern:        "Este valor es incorrecto.",
        min:            "Este valor no debe ser menor que %s.",
        max:            "Este valor no debe ser mayor que %s.",
        range:          "Este valor debe estar entre %s y %s.",
        minlength:      "Este valor es muy corto. La longitud mínima es de %s caracteres.",
        maxlength:      "Este valor es muy largo. La longitud máxima es de %s caracteres.",
        length:         "La longitud de este valor debe estar entre %s y %s caracteres.",
        mincheck:       "Debe seleccionar al menos %s opciones.",
        maxcheck:       "Debe seleccionar %s opciones o menos.",
        check:          "Debe seleccionar entre %s y %s opciones.",
        equalto:        "Este valor debe ser igual."
      });
      window.Parsley.setLocale('es');
    </script>


    <script>
      document.addEventListener('DOMContentLoaded', function () {
        window.Parsley.setLocale('es');
        $('form[data-parsley-validate]').parsley();
        // console.log("Parsley inicializado y listo.");
      });
    </script>

     <!-- Custom Theme Scripts -->
    <script src="{{ asset('dashboard/build/js/custom.js') }}"></script>

        
    @stack('scripts')

  </body>
</html>
