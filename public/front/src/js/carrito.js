import { formatearDinero } from "../helpers/index.js";

//=============== VARIABLES ===============//
const carritoContenedor = document.querySelector("#carrito-contenedor");
let carrito = [
  {
    id: 1,
    nombre: "Ciclos",
    url_imagen: "/public/img/books/ciclos.jpg",
    precio: 300,
    cantidad: 2,
    unidades: 10,
  },
  {
    id: 2,
    nombre: "Eclipse",
    url_imagen: "/public/img/books/eclipse.jpeg",
    precio: 300,
    cantidad: 4,
    unidades: 5,
  },
];

//=============== FUNCIONES ===============//
function imprimirHTML(carrito) {
  if (carrito.length > 0) {
    // Total a pagar
    const subTotal = carrito.reduce(
      (total, articulo) => total + articulo.precio * articulo.cantidad,
      0
    );
    carritoContenedor.innerHTML = `
        <section class="carrito__grid">
          <section class="carrito__left">
            <div class="carrito__encabezado">
              <h2>1 articulos</h2>
            </div>
            <section class="carrito__articulos">
              ${carrito.map(
                ({ id, nombre, url_imagen, cantidad, precio, unidades }) => `
                <article>
                  <img src="${url_imagen}" alt="${nombre}" width="185px" height="260px" />
                  <div>
                    <h3>${nombre}</h3>
                    <h4>Costo unitario: <span>${formatearDinero(
                      precio
                    )}</span></h4>
                    <h4>Costo Total: <span>${formatearDinero(
                      precio * cantidad
                    )}</span></h4>
                    <div class="carrito__select">
                      <h4>Cantidad</h4>
                      <select name="cantidad" value="${cantidad}" class="cantidad">
                        ${Array.from(new Array(unidades), (_, i) => i + 1).map(
                          (valor) => `
                          <option value="${valor}" ${
                            valor === cantidad ? "selected" : ""
                          }>${valor}</option>
                        `
                        )}
                      </select>
                    </div>
                    <button data-id="${id}" class="btn-eliminar-articulo">Eliminar</button>
                  </div>
                </article>
              `
              )}
            </section>
            <div class="carrito__bottom">
              <span>SubTotal:</span>
              <span>${formatearDinero(subTotal)}</span>
            </div>
          </section>


          <section class="carrito__right">
            <div class="carrito__card">
              <h2>Resumen</h2>
              <div class="carrito__subtotalpagar">
                <span>Subtotal</span>
                <span>${formatearDinero(subTotal)}</span>
              </div>
              <a href="detallePedido.html" class="boton-primary">Procesar</a>
            </div>
            <div class="carrito__card">
              <div class="carrito__metodos">Métodos de pago permitidos</div>

              <div class="carrito__pagos">
                <img
                  width="60px"
                  height="60px"
                  src="../../../public/svg/Apple_Pay.svg"
                  alt="Apple Pay"
                  title="Apple Pay"
                />

                <img
                  width="60px"
                  height="60px"
                  src="../../../public/svg/Google_Pay.svg"
                  alt="Google Pay"
                  title="Google Pay"
                />

                <img
                  width="60px"
                  height="60px"
                  src="../../../public/svg/Maestro.svg"
                  alt="Maestro"
                  title="Maestro"
                />

                <img
                  width="60px"
                  height="60px"
                  src="../../../public/svg/Mastercard.svg"
                  alt="Mastercard"
                  title="Mastercard"
                />
                <img
                  width="60px"
                  height="60px"
                  src="../../../public/svg/Visa.svg"
                  alt="Visa"
                  title="Visa"
                />
              </div>
            </div>
          </section>
        </section>
    `;
  } else {
    carritoContenedor.innerHTML = `
      <div class="carrito__vacio">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z"
          />
        </svg>

        <p>Tu cesta está vacía. ¡Empieza a comprar ya!</p>
        <a href="../libros.html" class="boton-secundary">Comprar</a>
      </div>
    `;
  }
}
imprimirHTML(carrito);

// Evento de eliminar un articulo
carritoContenedor.addEventListener("click", (e) => {
  if (e.target.classList.contains("btn-eliminar-articulo")) {
    const id = Number(e.target.dataset.id);
    eliminarArticulo(id);
    localStorage.setItem("carrito", JSON.stringify(carrito));
    imprimirHTML(carrito);
  }
});

// Funcion que eliminar un articulo del carrito
function eliminarArticulo(id) {
  const carritoActualizado = carrito.filter((articulo) => articulo.id !== id);
  carrito = carritoActualizado;
}
