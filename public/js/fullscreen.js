const btnFullscreen = document.getElementById('btnFullscreen');
      const icon = document.getElementById('fullscreenIcon');

      btnFullscreen.addEventListener('click', function(e) {
        e.preventDefault();

        if (!document.fullscreenElement) {
          document.documentElement.requestFullscreen();
          icon.classList.remove('glyphicon-fullscreen');
          icon.classList.add('glyphicon-resize-small');
          btnFullscreen.setAttribute('title', 'Restaurar');
          $(btnFullscreen).tooltip('dispose').tooltip();
        } else {
          if (document.exitFullscreen) {
            document.exitFullscreen();
          }
          icon.classList.remove('glyphicon-resize-small');
          icon.classList.add('glyphicon-fullscreen');
          btnFullscreen.setAttribute('title', 'FullScreen');
          $(btnFullscreen).tooltip('dispose').tooltip();
        }
      });

      document.addEventListener('fullscreenchange', () => {
        if (!document.fullscreenElement) {
          icon.classList.remove('glyphicon-resize-small');
          icon.classList.add('glyphicon-fullscreen');
          btnFullscreen.setAttribute('title', 'FullScreen');
          $(btnFullscreen).tooltip('dispose').tooltip();
        } else {
          icon.classList.remove('glyphicon-fullscreen');
          icon.classList.add('glyphicon-resize-small');
          btnFullscreen.setAttribute('title', 'Restaurar');
          $(btnFullscreen).tooltip('dispose').tooltip();
        }
      });