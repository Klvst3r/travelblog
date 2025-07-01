// validate-post.js
$(function () {
    $('#form-post').on('submit', function (e) {
        let ok = true;

        // ① valida editor
        ok = validateEditor('#editor', '#descr') && ok;

        // ② valida select2 múltiple de etiquetas
        ok = validateSelect2($('#tags'), '#tags-error') && ok;

        if (!ok) e.preventDefault();        // detiene envío
    });
});
