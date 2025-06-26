document.addEventListener('DOMContentLoaded', () => {
    const darkModeToggle = document.getElementById('btnDarkMode');
    const body = document.body;

    // Cargar preferencia desde localStorage
    if (localStorage.getItem('dark-mode') === 'enabled') {
      body.classList.add('dark-mode');
    }

    darkModeToggle.addEventListener('click', () => {
      body.classList.toggle('dark-mode');

      // Guardar preferencia
      if (body.classList.contains('dark-mode')) {
        localStorage.setItem('dark-mode', 'enabled');
      } else {
        localStorage.setItem('dark-mode', 'disabled');
      }
    });
  });