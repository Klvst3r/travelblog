document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-post');
    const editor = document.getElementById('editor');
    const textarea = document.getElementById('descr');

    if (form && editor && textarea) {
        form.addEventListener('submit', function (e) {
            textarea.value = editor.innerHTML.trim();

            const parsleyForm = $(form).parsley();
            parsleyForm.validate();

            if (!parsleyForm.isValid()) {
                e.preventDefault(); // detiene envío si hay errores
                return false;
            }
        });
    }
});
