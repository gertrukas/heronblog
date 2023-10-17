
// obtenerProducto();
document.addEventListener('DOMContentLoaded', () => {
  desplegarDescripcion();
  copyEnlace();
});


// Funcion para copiar el enlace del producto
function copyEnlace() {
  // VARIABLES
  const btnCopy = document.querySelector("#btn-copy");


  if (btnCopy) {
    //=============== EVENTOS ===============//
    // Copiar la url del producto para compartir
    btnCopy.addEventListener("click", () => {
      const url = window.location.href;
      navigator.clipboard.writeText(url);
      btnCopy.title = "Copiado";
      btnCopy.innerHTML = `
        <svg
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"
          ></path>
        </svg>
        Enlace copiado!
      `;

      setTimeout(() => {
        btnCopy.title = "Copiar";
        btnCopy.innerHTML = `
        <svg
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
        >
        <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
        ></path>
        </svg>
        Copiar enlace
        `;
      }, 2000);
    });

  }


}

// Funcion para desplegar la descripcion del producto
function desplegarDescripcion() {
  // VARIABLES
  const btnDescripcion = document.querySelector("#btn-descripcion");
  const desplegableDescripcion = document.querySelector(
    "#desplegable-descripcion"
  );

  //=============== EVENTOS ===============//
  // Evento para despleglar la descripcion
  if (btnDescripcion) {


    btnDescripcion.addEventListener("click", () =>
      desplegableDescripcion.classList.toggle("open")
    );
  }
}

