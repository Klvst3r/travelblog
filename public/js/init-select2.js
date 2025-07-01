// init-select2.js
$(function () {
    $('.select2').select2({
        placeholder: 'Selecciona opciones',
        allowClear: true,
        width: '100%'      // evita problemas de ancho al recargar
    });
});
