window.addEventListener('load', function() {
  var loader = document.querySelector('.Cargarpag');
  loader.style.display = 'block';

  setTimeout(function() {
    loader.style.display = 'none';},
    900);
});


document.addEventListener('DOMContentLoaded', () => {
  const carrusel = document.querySelector('.carrusel');
  const botonAnterior = document.querySelector('.anterior-acerca');
  const botonSiguiente = document.querySelector('.siguiente-acerca');
  let apartadoActual = 0;

  botonAnterior.addEventListener('click', () => {
      apartadoActual = Math.max(apartadoActual - 1, 0);
      actualizarCarrusel();
  });

  botonSiguiente.addEventListener('click', () => {
      apartadoActual = Math.min(apartadoActual + 1, carrusel.children.length - 1);
      actualizarCarrusel();
  });

  function actualizarCarrusel() {
      const scrollAmount = carrusel.children[apartadoActual].offsetLeft;
      carrusel.scrollTo({
          top: 0,
          left: scrollAmount,
          behavior: 'smooth'
      });
  }
});

const carrusel = document.querySelector('.carrusel');
const botonAnterior = document.querySelector('.anterior');
const botonAnteriorAc = document.querySelector('.anterior-acerca');
const botonSiguiente = document.querySelector('.siguiente');
const botonSiguienteAc = document.querySelector('.siguiente-acerca');
const apartados = document.querySelectorAll('.apartado');
const apartadosAc = document.querySelectorAll('.apartado-acerca');

let scrollAmount = 0;
let apartadoActual = 0;
let apartadoActualAc = 0;

const intervalo = setInterval(() => {
  apartadoActual = (apartadoActual + 1) % apartados.length;
  scrollAmount = apartados[apartadoActual].offsetLeft;
  carrusel.scrollTo({
    top: 0,
    left: scrollAmount,
    behavior: 'smooth'
  });
}, 5000);

const intervaloAc = setInterval(() => {
  apartadoActualAc = (apartadoActualAc + 1) % apartadosAc.length;
  scrollAmount = apartadosAc[apartadoActual].offsetLeft;
  carrusel.scrollTo({
    top: 0,
    left: scrollAmount,
    behavior: 'smooth'
  });
}, 5000);

botonAnterior.addEventListener('click', () => {
  apartadoActual = Math.max(apartadoActual - 1, 0);
  scrollAmount = apartados[apartadoActual].offsetLeft;
  carrusel.scrollTo({
    top: 0,
    left: scrollAmount,
    behavior: 'smooth'
  });
});



botonSiguiente.addEventListener('click', () => {
  apartadoActual = Math.min(apartadoActual + 1, apartados.length - 1);
  scrollAmount = apartados[apartadoActual].offsetLeft;
  carrusel.scrollTo({
    top: 0,
    left: scrollAmount,
    behavior: 'smooth'
  });
});

botonSiguienteAc.addEventListener('click', () => {
  apartadoActualAc = Math.min(apartadoActualAc + 1, apartadosAc.length - 1);
  scrollAmount = apartadosAc[apartadoActualAc].offsetLeft;
  carrusel.scrollTo({
    top: 0,
    left: scrollAmount,
    behavior: 'smooth'
  });
});

botonAnterior.addEventListener('click', () => clearInterval(intervalo));
botonSiguiente.addEventListener('click', () => clearInterval(intervalo));
botonSiguienteAc.addEventListener('click', () => clearInterval(intervaloAc));