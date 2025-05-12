function abrirImagen(img) {
    // Crear un elemento div para la visualización de la imagen a pantalla completa
    var pantallaCompleta = document.createElement('div');
    pantallaCompleta.className = 'pantalla-completa';
    
    // Crear la imagen a mostrar
    var imagenCompleta = document.createElement('img');
    imagenCompleta.src = img.src;
    imagenCompleta.alt = img.alt;
  
    // Agregar la imagen a la pantalla completa
    pantallaCompleta.appendChild(imagenCompleta);
  
    // Agregar la pantalla completa al body del documento
    document.body.appendChild(pantallaCompleta);
  
    // Añadir evento de clic para cerrar la imagen a pantalla completa
    pantallaCompleta.addEventListener('click', function() {
      document.body.removeChild(pantallaCompleta);
    });
  }