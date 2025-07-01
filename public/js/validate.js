// validate.js

$(document).ready(function () {
    // ✅ Inicializa Select2
    $('.select2').select2({
        placeholder: 'Selecciona etiquetas',
        allowClear: true
    });

    // ✅ Inicializa WYSIWYG Editor si se requiere (según ID)
    if ($('#editor-one').length) {
        $('#editor-one').wysiwyg();
    }

    // ✅ Formulario de creación de posts
    $('#form-post').on('submit', function (e) {
        let isValid = true;

        // === Validación del editor enriquecido ===
        const content = $('#editor').html().trim();
        const contentText = content.replace(/<[^>]*>/g, '').replace(/&nbsp;/g, '').trim();
        if (!contentText) {
            $('#editor').css('border', '1px solid red');
            isValid = false;
        } else {
            $('#editor').css('border', '1px solid #ccc');
            $('#descr').val(content); // Copia al textarea oculto
        }

        // === Validación de select2 múltiple ===
        const selectedTags = $('#tags').val();
        const $selectBox = $('#tags').parent().find('.select2-selection');

        if (!selectedTags || selectedTags.length === 0) {
            $selectBox.addClass('error-border');
            $('#tags-error').show();
            isValid = false;
        } else {
            $selectBox.removeClass('error-border');
            $('#tags-error').hide();
        }

        if (!isValid) {
            e.preventDefault(); // Detener envío si no es válido
        }
    });

    // 🧼 Limpieza visual al cambiar Select2
    $('#tags').on('change', function () {
        if ($(this).val().length > 0) {
            $('#tags').parent().find('.select2-selection').removeClass('error-border');
            $('#tags-error').hide();
        }
    });
});
