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

 <!-- jQuery -->
 <script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>

 <!-- Fullscreen -->
 <script src="{{ asset('js/fullscreen.js') }}"></script>

 <!-- Bootstrap -->
 <script src="{{ asset('dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

 <!-- WYSIWYG -->
 <script src="{{ asset('dashboard/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
 <script src="{{ asset('dashboard/vendors/google-code-prettify/src/prettify.js') }}"></script>

 <!-- Select2 -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
 <script src="{{ asset('js/parsley.min.js') }}"></script>

 <!-- Traducción al español para Parsley -->
 <script src="{{ asset('js/parsley-es.js') }}"></script>

 <!-- Custom Theme Scripts (ANTES de las inicializaciones específicas) -->
 <script src="{{ asset('dashboard/build/js/custom.js') }}"></script>

 <!-- Inicializadores (no dependen de validaciones) -->
 <script src="{{ asset('js/init-select2.js') }}"></script>
 <script src="{{ asset('js/init-wysiwyg.js') }}"></script>

 <!-- Validaciones reutilizables -->
 <script src="{{ asset('js/validate-select2.js') }}"></script>
 <script src="{{ asset('js/validate-editor.js') }}"></script>

 <!-- Validación específica del formulario Post -->
 <script src="{{ asset('js/validate-post.js') }}"></script>

 <!-- Inicialización única de Parsley -->
 <script>
     $(document).ready(function() {
         // Debug para verificar que todo esté cargado
         console.log('jQuery:', typeof $ !== 'undefined');
         console.log('Parsley:', typeof window.Parsley !== 'undefined');
         console.log('Parsley plugin:', typeof $.fn.parsley !== 'undefined');

         // Configurar Parsley globalmente
         if (typeof window.Parsley !== 'undefined') {
             window.Parsley.setLocale('es');

             // Inicializar todos los formularios con data-parsley-validate
             $('form[data-parsley-validate]').each(function() {
                 $(this).parsley({
                     errorClass: 'is-invalid',
                     successClass: 'is-valid',
                     errorsWrapper: '<div class="invalid-feedback"></div>',
                     errorTemplate: '<div></div>'
                 });
             });

             console.log('Parsley inicializado correctamente');
         } else {
             console.error('Parsley no está disponible');
         }
     });
 </script>

 <!-- Script específico para formulario de posts -->
 <script>
     $(document).ready(function() {
         const $form = $('#form-post');
         const $editor = $('#editor');
         const $textarea = $('#descr');

         if ($form.length && $editor.length && $textarea.length) {
             $form.on('submit', function(e) {
                 // Copiar contenido del editor al textarea
                 $textarea.val($editor.html().trim());

                 // Obtener instancia de Parsley
                 const parsleyForm = $form.parsley();

                 if (parsleyForm) {
                     // Forzar validación
                     parsleyForm.validate();

                     // Verificar si es válido
                     if (!parsleyForm.isValid()) {
                         e.preventDefault();
                         console.warn("Formulario inválido");
                         return false;
                     }
                 }
             });
         }
     });
 </script>

 @stack('scripts')
 </body>

 </html>
