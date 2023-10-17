"use strict";
import { formatearDinero } from "../helpers/index.js";

//=============== REALIZAR PETICIONES DE LAS COLECCIONES ===============//
const obtenerPedidos = async () => {
  try {
    const res = await fetch("/src/data/pedidos.json");
    const { data } = await res.json();
    // filtrar los pedidos pendientes
    const pedidosPendientes = data.filter(
      (pedido) => pedido.estado === "pendiente"
    );
    // filtrar los pedidos completados
    const pedidosCompletados = data.filter(
      (pedido) => pedido.estado === "entregado"
    );
    console.log(pedidosPendientes);
    console.log(pedidosCompletados);
    imprimirPedidos(pedidosPendientes, pedidosCompletados);
  } catch (error) {
    console.log(error);
  }
};
obtenerPedidos();

//=============== IMPRIMIR HTML DE LAS COLECCIONES ===============//
const imprimirPedidos = (pedidosPendientes, pedidosCompletados) => {
  // Recorrer los productos
  pedidosPendientes.forEach((producto) => {
    // DOM HTML de los pedidos pendientes
    imprimirPedidosPendientes(producto);
  });
  pedidosCompletados.forEach((producto) => {
    // DOM HTML de los pedidos completados
    imprimirPedidosCompletados(producto);
  });

  eventosPedidos();
};

// Imprimir pedidos pendientes
const imprimirPedidosPendientes = (producto) => {
  const contenedorPendientes = document.querySelector("#pedidos-completados");

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

  contenedorPendientes.innerHTML += `
          <div class="producto">
            <div class="producto__imagen">

              <a href="/src/pages/producto.html?producto=${url_book}" class="producto__link" title="${nombre}">
                <img
                  src="${url_imagen}"
                  alt="${nombre}"
                  title="${nombre}"
                  width="185px"
                  height="260px"
              /></a>
            </div>
            <div class="producto__description">
              <div class="producto__title">
                <a href="/src/pages/producto.html?producto=${url_book}" title="${nombre}">${nombre}</a>
              </div>

              <p class="producto__precio">${formatearDinero(precio)}</p>
            </div>
          </div>
      `;
};
// Imprimir pedidos completados
const imprimirPedidosCompletados = (producto) => {
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

  // contenedor de los pedidos
  const contenedorCompletados = document.querySelector("#pedidos-pendientes");

  contenedorCompletados.innerHTML += `
          <div class="producto">
            <div class="producto__imagen">

              <a href="/src/pages/producto.html?producto=${url_book}" class="producto__link" title="${nombre}">
                <img
                  src="${url_imagen}"
                  alt="${nombre}"
                  title="${nombre}"
                  width="185px"
                  height="260px"
              /></a>

            </div>
            <div class="producto__description">
              <div class="producto__title">
                <a href="/src/pages/producto.html?producto=${url_book}" title="${nombre}">${nombre}</a>
              </div>

              <p class="producto__precio">${formatearDinero(precio)}</p>
            </div>
          </div>
      `;
};

// eventos de mostrar y ocultar los pedidos
const eventosPedidos = () => {
  const contenedorPedidos = document.querySelector("#contenedor-pedidos");
  const btnPedidosPendientes = document.querySelector(
    "#btn-pedidos-pendientes"
  );
  const btnPedidosCompletados = document.querySelector(
    "#btn-pedidos-entregados"
  );

  // Evento de mostrar pedidos completados
  btnPedidosPendientes.addEventListener("click", () => {
    contenedorPedidos.classList.remove("active");
    btnPedidosPendientes.classList.add("active");
    btnPedidosCompletados.classList.remove("active");
  });

  // Evento de mostrar pedidos pendientes
  btnPedidosCompletados.addEventListener("click", () => {
    contenedorPedidos.classList.add("active");
    btnPedidosPendientes.classList.remove("active");
    btnPedidosCompletados.classList.add("active");
  });
};

// Editar cuenta
function editarCuenta() {
  //=============== VARIABLES ===============//
  const formularioCuenta = document.querySelector("#formulario-cuenta");
  const cuentaEditar = document.querySelector("#cuenta-editar");
  const btnRegistar = document.querySelector("#actualizar-cuenta-btn");
  const btnCerrarCuenta = document.querySelector("#cerrar-cuenta-btn");
  const btnEditar = document.querySelector("#editar-perfil-btn");

  //=============== EVENTOS ===============//
  formularioCuenta.addEventListener("submit", validarDatos);
  btnEditar.addEventListener("click", () => {
    cuentaEditar.classList.add("open");
  });
  btnCerrarCuenta.addEventListener("click", () => {
    cuentaEditar.classList.remove("open");
  });

  //=============== FUNCIONES ===============//
  async function validarDatos(e) {
    e.preventDefault();
    // Obtener los datos del formulario
    const data = Object.fromEntries(new FormData(formularioCuenta));

    // Si los datos estan vacios
    if (Object.values(data).includes("")) {
      Swal.fire({
        title: "Campos vacios",
        text: "Todos los campos son obligatorios",
        icon: "info",
        confirmButtonText: "Aceptar",
      });
      return;
    }

    // Validar el correo
    if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(data.email)) {
      Swal.fire({
        title: "Correo invalido",
        text: "El correo ingresado no es valido",
        icon: "info",
        confirmButtonText: "Aceptar",
      });
      return;
    }

    // Validar el nombre debe tener al menos 3 caracteres y maximo 20
    if (data.nombre.trim().length < 3 || data.nombre.trim().length > 20) {
      Swal.fire({
        title: "Nombre invalido",
        text: "El nombre debe tener al menos 3 caracteres y maximo 20",
        icon: "info",
        confirmButtonText: "Aceptar",
      });
      return;
    }

    // Validar el apellido debe tener al menos 3 caracteres y maximo 20
    if (data.apellidos.trim().length < 3 || data.apellidos.trim().length > 20) {
      Swal.fire({
        title: "Apellido invalido",
        text: "El apellido debe tener al menos 3 caracteres y maximo 20",
        icon: "info",
        confirmButtonText: "Aceptar",
      });
      return;
    }

    // Valida el telefono
    if (!/^\d{9}$/.test(data.telefono)) {
      Swal.fire({
        title: "Telefono invalido",
        text: "El telefono debe tener 9 digitos",
        icon: "info",
        confirmButtonText: "Aceptar",
      });
      return;
    }

    // Realizar la peticion
    try {
      // Animacion de carga del boton
      btnRegistar.disabled = true;
      btnRegistar.innerHTML = `Actualzando...`;

      // ? Peticion aqui...
      console.log(data);

      // Resetear el formulario
      formularioCuenta.reset();

      // Mostrar mensaje de exito
      Swal.fire({
        title: "Actualizado",
        text: "Su cuenta ah sido actualizada correctamente",
        icon: "success",
        confirmButtonText: "Aceptar",
        timer: 3000,
      });
    } catch (error) {
      // En caso de error
      console.log(error.message);
      Swal.fire({
        title: "Ups!",
        text: error.message,
        icon: "error",
        confirmButtonText: "Aceptar",
      });
    }
    // Habilitar el boton
    btnRegistar.disabled = false;
    btnRegistar.innerHTML = `Actualizar`;
    cuentaEditar.classList.remove("open");
  }
}
editarCuenta();
