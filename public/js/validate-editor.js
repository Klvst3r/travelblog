// validate-editor.js
function editorIsEmpty(html) {
    return !html || html.replace(/<[^>]*>/g, '').replace(/&nbsp;/g, '').trim() === '';
}

function validateEditor(editorSelector, textareaSelector) {
    const $editor = $(editorSelector);
    const content = $editor.html().trim();

    if (editorIsEmpty(content)) {
        $editor.css('border', '1px solid red');
        return false;
    }
    $editor.css('border', '1px solid #ccc');
    $(textareaSelector).val(content);      // copia al <textarea> oculto
    return true;
}
