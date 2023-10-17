//=============== VARIABLES ===============//
const resultadosConfirmarCuenta = document.querySelector(
  "#confirmacion-resultados"
);

//=============== FUNCIONES ===============//
// Función para confirmar la cuenta
const getConfirmarCuenta = async () => {
  try {
    // ? Petición aqui...

    // Mostrar resultados
    resultadosConfirmarCuenta.innerHTML = `
      <section class="alerta succes">
        <h2>¡Cuenta confirmada!</h4>
        <p>¡Tu cuenta ha sido confirmada con éxito!</p>
        <p class="mb-0">Ahora puedes iniciar sesión.</p>
        <a href="./iniciarSesion.html" class="boton-primary">Iniciar sesión</a>
      </section>
    `;
  } catch (error) {
    console.log(error.message);
    // Mostrar resultados
    resultadosConfirmarCuenta.innerHTML = `
      <section class="alerta error">
        <h2>¡Error!</h4>
        <p>Ha ocurrido un error al confirmar tu cuenta.</p>
        <p class="mb-0">Por favor, intenta de nuevo.</p>
        <a href="./registrar.html" class="boton-primary">Volver al inicio</a>
      </section>
    `;
  }
};
getConfirmarCuenta();
