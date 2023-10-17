//=============== VARIABLES ===============//
const subNavegacion = document.querySelector("#subNavegacion");
const btnMenu = document.querySelector("#menu-toggle");
const btnsClose = document.querySelectorAll("#close-subNavegacion");
const body = document.querySelector("body");
const btnSearch = document.querySelector("#search-btn-toggle");
const search = document.querySelector("#search");

//=============== EVENTOS ===============//
// Evento para abrir el menu
btnMenu.addEventListener("click", () => {
  subNavegacion.classList.add("open");
  body.style.overflow = "hidden";
});

// Evento para cerrar el menu
btnsClose.forEach((btn) => {
  btn.addEventListener("click", () => {
    subNavegacion.classList.remove("open");
    body.style.overflow = "auto";
  });
});

// Evento para mostrar el buscador
btnSearch.addEventListener("click", () => {
  search.classList.toggle("open");
});

// Funcion para mostrar el html de las opciones dependiendo si el usuario esta autenticado o no
const HTML_OPCIONES = () => {
  const opcionesContenedor = document.querySelector("#opciones-contenedor");
  const btn_usuario = document.querySelector(
    "#btn-usuario #btn-usuario-contenido"
  );
  const autenticado = false;
  // Si esta autenticado
  if (autenticado) {
    btn_usuario.innerHTML = ` 
      <img src="https://picsum.photos/200" alt="Foto de perfil" width="50" height="50" />
    `;

    opcionesContenedor.innerHTML = `
      <span>Bienvenido</span>
       <a href="/src/pages/auth/cuenta.html" title="Cuenta">
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
             d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
           ></path>
         </svg>
         Tu cuenta
       </a>
       <a href="/src/pages/libros.html">
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
             d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
           ></path>
         </svg>
         Libros
       </a>
       <a href="/src/pages/cart/carrito.html">
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
             d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
           ></path>
         </svg>
         Carrito
       </a>

        <button
         class="header__opcionesCerrarSesion"
       >
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
             d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
           ></path>
         </svg>
         CERRAR SESIÓN
       </button>
      `;
  } else {
    btn_usuario.innerHTML = `
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
             d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
           ></path>
       </svg>
      `;
    opcionesContenedor.innerHTML = `
        <span>Enlaces rapidos</span>
          <a href="/src/pages/libros.html">
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
                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
              ></path>
            </svg>
            Libros
          </a>
          <a href="/src/pages/cart/carrito.html">
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
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
              ></path>
            </svg>
            Carrito
          </a>
          <div class="header__opcionesRegistrar">
            <p>¿No tienes una cuenta?</p>
            <a href="/src/pages/auth/registrar.html">Registrate</a>
          </div>
          <a
            href="/src/pages/auth/iniciarSesion.html"
            class="header__opcionesLogin"
          >
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
                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
              ></path>
            </svg>
            INICIAR SESIÓN
          </a>
        `;
  }
};
// HTML_OPCIONES();
