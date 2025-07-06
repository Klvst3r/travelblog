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
          url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
          search: "Filtrar:",
          lengthMenu: "Mostrar _MENU_ registros por página",
          info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
          paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
          },
          buttons: {
            copyTitle: 'Copiado al portapapeles',
            copySuccess: {
              1: 'Se copió una fila',
              _: 'Se copiaron %d filas'
            }
          },
          zeroRecords: "No se encontraron registros",
          infoEmpty: "Mostrando 0 a 0 de 0 registros",
          infoFiltered: "(filtrado de _MAX_ registros)"
        },
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
        }
      });
    }
  });
});
