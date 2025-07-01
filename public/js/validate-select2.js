// validate-select2.js
function validateSelect2($select, errorSelector) {
    const val = $select.val();
    const $box = $select.next('.select2-container').find('.select2-selection');
    if (!val || val.length === 0) {
        $box.addClass('error-border');
        $(errorSelector).show();
        return false;
    }
    $box.removeClass('error-border');
    $(errorSelector).hide();
    return true;
}

// Limpieza visual on‑change (funciona para todos los select2)
$(function () {
    $(document).on('change', '.select2', function () {
        const $box = $(this).next('.select2-container').find('.select2-selection');
        if ($(this).val().length) {
            $box.removeClass('error-border');
            $(`#${$(this).attr('id')}-error`).hide();
        }
    });
});
