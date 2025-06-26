document.addEventListener("DOMContentLoaded", function () {
  const tables = document.querySelectorAll('.dt-indice');

  tables.forEach(function (table) {
    const $table = $(table);
    if ($table.length) {
      $table.DataTable({
        dom: 'Bfrtip',
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
          lengthMenu: "Mostrar _MENU_ registros",
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
        }
      });
    }
  });
});
