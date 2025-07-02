
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-post');
    const editor = document.getElementById('editor');
    const textarea = document.getElementById('descr');

    if (form && editor && textarea) {
        form.addEventListener('submit', function (e) {
            const content = editor.innerHTML.trim();

            // Validación específica del contenido enriquecido
            if (!content || content === '<br>') {
                alert('El campo "Contenido" es obligatorio.');
                e.preventDefault();
                return false;
            }

            // Pasamos el contenido al textarea oculto
            textarea.value = content;

            // Validación del resto del formulario con Parsley
            const parsleyForm = $(form).parsley();
            parsleyForm.validate();

            if (!parsleyForm.isValid()) {
                e.preventDefault();
                return false;
            }
        });
    }
});

