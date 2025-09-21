document.addEventListener("DOMContentLoaded", function () {
  const tables = document.querySelectorAll('.dt-indice');
  tables.forEach(function (table) {
    const $table = $(table);
    if ($table.length) {
      const createUrl = $table.data('create-url'); // <- Obtiene el valor dinámico desde Blade
      $table.DataTable({
        dom: 'Bflrtip', // B: botones, f: filtro, l: length, r: processing, t: tabla, i: info, p: paginación
        buttons: [
          {
            extend: 'copy',
            text: '<i class="fa fa-files-o" style="font-size:20px;"></i>',
            titleAttr: 'Copiar'
          },
          {
            extend: 'csv',
            text: '<i class="fa fa-file-text-o text-secondary" style="font-size:20px;"></i>',
            titleAttr: 'Exportar a CSV'
          },
          {
            extend: 'excel',
            text: '<i class="fa fa-file-excel-o text-success" style="font-size:20px;"></i>',
            titleAttr: 'Exportar a Excel'
          },
          {
            extend: 'pdf',
            text: '<i class="fa fa-file-pdf-o text-danger" style="font-size:20px;"></i>',
            titleAttr: 'Exportar a PDF'
          },
          {
            extend: 'print',
            text: '<i class="fa fa-print text-info" style="font-size:20px;"></i>',
            titleAttr: 'Imprimir'
          }
        ],
        language: {
          // Configuración de idioma inline (sin URL externa)
          "processing": "Procesando...",
          "lengthMenu": "Mostrar _MENU_ registros por página",
          "zeroRecords": "No se encontraron registros",
          "emptyTable": "Ningún dato disponible en esta tabla",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
          "infoEmpty": "Mostrando 0 a 0 de 0 registros",
          "infoFiltered": "(filtrado de _MAX_ registros)",
          "search": "Filtrar:",
          "loadingRecords": "Cargando...",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          "aria": {
            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
          },
          "buttons": {
            "copy": "Copiar",
            "copyTitle": "Copiado al portapapeles",
            "copySuccess": {
              "1": "Se copió 1 fila",
              "_": "Se copiaron %d filas"
            },
            "csv": "CSV",
            "excel": "Excel",
            "pdf": "PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad de columnas",
            "collection": "Colección",
            "colvisRestore": "Restaurar visibilidad"
          },
          "select": {
            "rows": {
              "1": "1 fila seleccionada",
              "_": "%d filas seleccionadas"
            }
          }
        },
        // Configuraciones adicionales para mejorar la experiencia
        responsive: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        order: [[0, 'desc']], // Ordenar por primera columna descendente por defecto
        columnDefs: [
          {
            targets: -1, // Última columna (generalmente Acciones)
            orderable: false,
            searchable: false,
            width: "180px"
          }
        ],
        processing: true,
        autoWidth: false,
        stateSave: true, // Guarda el estado de la tabla (página actual, ordenamiento, etc.)
        initComplete: function () {
          // Si no hay URL, no se agrega el botón
          if (!createUrl) return;
          
          // Botón Agregar dinámico
          const $botonAgregar = $(`
            <div class="ms-auto">
              <a href="${createUrl}" class="btn btn-success">
                <i class="fa fa-plus"></i> Agregar
              </a>
            </div>
          `);
          
          // Envoltura y agregación del botón
          const $wrapper = $table.closest('.dataTables_wrapper');
          const $btns = $wrapper.find('.dt-buttons');
          
          if (!$btns.parent().hasClass('d-flex')) {
            $btns.wrap(`
              <div class="d-flex justify-content-between flex-wrap w-100 align-items-center mb-3"></div>
            `);
          }
          
          $btns.parent().append($botonAgregar);

          // Personalizar estilos de los elementos de DataTables
          $wrapper.find('.dataTables_filter input').addClass('form-control form-control-sm').attr('placeholder', 'Buscar registros...');
          $wrapper.find('.dataTables_length select').addClass('form-control form-control-sm');
          
          console.log('DataTable inicializado correctamente:', table.id);
        }
      });
    }
  });
  
  // Log para debugging
  console.log('dt-init.js cargado, tablas encontradas:', tables.length);
});