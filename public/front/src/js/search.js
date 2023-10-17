"use strict";
import { formatearDinero } from "../helpers/index.js";

//=============== REALIZAR PETICIONES DEL PRODUCTO ===============//
const obtenerProducto = async () => {
  // Obtener el valor del parametro de nombre de la url
  const urlParams = new URLSearchParams(window.location.search);
  const search = urlParams.get("nombre");
  // Mostrar el nombre de la busqueda
  document.querySelector("#text-search").textContent =
    search || "Nada que buscar";

  try {
    const res = await fetch("/src/data/productosSearch.json?search=" + search);
    const { data } = await res.json();
    console.log(data);
    imprimirProductos(data);
  } catch (error) {
    console.log(error);
  }
};
obtenerProducto();

//=============== IMPRIMIR HTML LOS PRODUCTOS ===============//
const imprimirProductos = (data) => {
  // DOM HTML de las colecciones
  const resultados = document.querySelector("#search-resultados");

  // Recorrer los productos
  data.forEach((producto) => {
    const {
      id,
      url_book,
      nombre,
      descripcion,
      precio,
      unidades,
      url_imagen,
      url_amazon,
    } = producto;

    // Impresion de los targs
    imprimirTags({ nombre, url_book });

    // contenedor de cada producto
    const productoSection = document.createElement("section");
    productoSection.classList.add("producto");

    productoSection.innerHTML = `
            <div class="producto__imagen">
              <button
                type="button"
                class="producto__favorito"
                title="Agregar a favoritos"
                data-id="${id}"
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
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                  ></path>
                </svg>
              </button>

              <a href="/src/pages/producto.html?producto=${url_book}" class="producto__link" title="${nombre}">
                <img
                  src="${url_imagen}"
                  alt="${nombre}"
                  title="${nombre}"
                  width="185px"
                  height="260px"
              /></a>

              <div class="producto__botones">
                <button type="button" title="Agregar al carrito" data-id="${id}">
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
                      d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                    ></path>
                  </svg>
                </button>
                <a href="${url_amazon}" title="Comprar en amazon" target="_blank">
                    <svg
                      viewBox="2.167 .438 251.038 259.969"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g fill="none" fill-rule="evenodd">
                        <path
                          d="m221.503 210.324c-105.235 50.083-170.545 8.18-212.352-17.271-2.587-1.604-6.984.375-3.169 4.757 13.928 16.888 59.573 57.593 119.153 57.593 59.621 0 95.09-32.532 99.527-38.207 4.407-5.627 1.294-8.731-3.16-6.872zm29.555-16.322c-2.826-3.68-17.184-4.366-26.22-3.256-9.05 1.078-22.634 6.609-21.453 9.93.606 1.244 1.843.686 8.06.127 6.234-.622 23.698-2.826 27.337 1.931 3.656 4.79-5.57 27.608-7.255 31.288-1.628 3.68.622 4.629 3.68 2.178 3.016-2.45 8.476-8.795 12.14-17.774 3.639-9.028 5.858-21.622 3.71-24.424z"
                          fill="#f90"
                          fill-rule="nonzero"
                        />
                        <path
                          d="m150.744 108.13c0 13.141.332 24.1-6.31 35.77-5.361 9.489-13.853 15.324-23.341 15.324-12.952 0-20.495-9.868-20.495-24.432 0-28.75 25.76-33.968 50.146-33.968zm34.015 82.216c-2.23 1.992-5.456 2.135-7.97.806-11.196-9.298-13.189-13.615-19.356-22.487-18.502 18.882-31.596 24.527-55.601 24.527-28.37 0-50.478-17.506-50.478-52.565 0-27.373 14.85-46.018 35.96-55.126 18.313-8.066 43.884-9.489 63.43-11.718v-4.365c0-8.018.616-17.506-4.08-24.432-4.128-6.215-12.003-8.777-18.93-8.777-12.856 0-24.337 6.594-27.136 20.257-.57 3.037-2.799 6.026-5.835 6.168l-32.735-3.51c-2.751-.618-5.787-2.847-5.028-7.07 7.543-39.66 43.36-51.616 75.43-51.616 16.415 0 37.858 4.365 50.81 16.795 16.415 15.323 14.849 35.77 14.849 58.02v52.565c0 15.798 6.547 22.724 12.714 31.264 2.182 3.036 2.657 6.69-.095 8.966-6.879 5.74-19.119 16.415-25.855 22.393l-.095-.095"
                          fill="#000"
                        />
                        <path
                          d="m221.503 210.324c-105.235 50.083-170.545 8.18-212.352-17.271-2.587-1.604-6.984.375-3.169 4.757 13.928 16.888 59.573 57.593 119.153 57.593 59.621 0 95.09-32.532 99.527-38.207 4.407-5.627 1.294-8.731-3.16-6.872zm29.555-16.322c-2.826-3.68-17.184-4.366-26.22-3.256-9.05 1.078-22.634 6.609-21.453 9.93.606 1.244 1.843.686 8.06.127 6.234-.622 23.698-2.826 27.337 1.931 3.656 4.79-5.57 27.608-7.255 31.288-1.628 3.68.622 4.629 3.68 2.178 3.016-2.45 8.476-8.795 12.14-17.774 3.639-9.028 5.858-21.622 3.71-24.424z"
                          fill="#f90"
                          fill-rule="nonzero"
                        />
                        <path
                          d="m150.744 108.13c0 13.141.332 24.1-6.31 35.77-5.361 9.489-13.853 15.324-23.341 15.324-12.952 0-20.495-9.868-20.495-24.432 0-28.75 25.76-33.968 50.146-33.968zm34.015 82.216c-2.23 1.992-5.456 2.135-7.97.806-11.196-9.298-13.189-13.615-19.356-22.487-18.502 18.882-31.596 24.527-55.601 24.527-28.37 0-50.478-17.506-50.478-52.565 0-27.373 14.85-46.018 35.96-55.126 18.313-8.066 43.884-9.489 63.43-11.718v-4.365c0-8.018.616-17.506-4.08-24.432-4.128-6.215-12.003-8.777-18.93-8.777-12.856 0-24.337 6.594-27.136 20.257-.57 3.037-2.799 6.026-5.835 6.168l-32.735-3.51c-2.751-.618-5.787-2.847-5.028-7.07 7.543-39.66 43.36-51.616 75.43-51.616 16.415 0 37.858 4.365 50.81 16.795 16.415 15.323 14.849 35.77 14.849 58.02v52.565c0 15.798 6.547 22.724 12.714 31.264 2.182 3.036 2.657 6.69-.095 8.966-6.879 5.74-19.119 16.415-25.855 22.393l-.095-.095"
                          fill="currentColor"
                        />
                      </g>
                    </svg>
                </a>
                <a href="/src/pages/producto.html?producto=${url_book}" title="${nombre}" title="Visulizar producto">
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
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    ></path>
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                    ></path>
                  </svg>
                </a>
              </div>
            </div>
            <div class="producto__description">
              <div class="producto__title">
                <a href="/src/pages/producto.html?producto=${url_book}" title="${nombre}">${nombre}</a>
              </div>

              <p class="producto__precio">${formatearDinero(precio)}</p>
              <p class="producto__descripcion">${descripcion}</p>
            </div>
      `;
    resultados.appendChild(productoSection);
  });
  cambiarLayout();
};

// Funcion para imprimir los tags
const imprimirTags = ({ nombre, url_book }) => {
  const tags = document.querySelector("#coleccion-tags");
  // Imprimir los tags
  tags.innerHTML += `
        <a href="/src/pages/producto.html?producto=${url_book}" title="${nombre}">
            ${nombre}
        </a>
  `;
};

// Funcion para cambiar el layout del grid
function cambiarLayout() {
  // VARIABLES
  const botones = document.querySelectorAll("#boton-toggle-layout");
  const layout = document.querySelector("#search-resultados");
  const botonDescription = document.querySelector("#boton-toggle-description");

  // EVENTOS
  botones.forEach((boton) => {
    boton.addEventListener("click", () => {
      // Remover los botones activos
      const activo = document.querySelector(".active");
      activo && activo.classList.remove("active");

      // Agregar la clase active al boton
      boton.classList.add("active");
      const getData = boton.getAttribute("data-layout");
      layout.classList.replace(layout.classList[2], getData);
    });
  });

  botonDescription.addEventListener("click", () => {
    botonDescription.classList.toggle("mostrar");
    layout.classList.toggle("description");
  });
}
