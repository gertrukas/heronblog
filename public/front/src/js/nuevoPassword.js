//=============== VARIABLES ===============//
const formularioNuevoPassword = document.querySelector(
  "#formulario-nuevo-password"
);
const btnNuevoPassword = document.querySelector("#nuevo-password-btn");

//=============== EVENTOS ===============//
formularioNuevoPassword.addEventListener("submit", iniciarSesion);

//=============== FUNCIONES ===============//
async function iniciarSesion(e) {
  e.preventDefault();
  // Obtener los datos del formulario
  const { password, confirmarPassword } = Object.fromEntries(
    new FormData(formularioNuevoPassword)
  );

  // Campos vacios
  if (password.trimStart() === "" || confirmarPassword.trimStart() === "") {
    Swal.fire({
      title: "Campos vacios",
      text: "Todos los campos son obligatorios",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // La contraseña debe tener al menos 6 caracteres
  if (password.length < 6) {
    Swal.fire({
      title: "Contraseña demasiado corta",
      text: "La contraseña debe tener al menos 6 caracteres",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Si la contraseña no coincide
  if (password !== confirmarPassword) {
    Swal.fire({
      title: "Contraseña incorrecta",
      text: "Las contraseñas no coinciden",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Realizar la peticion
  try {
    // Animacion de carga del boton
    btnNuevoPassword.disabled = true;
    btnNuevoPassword.innerHTML = `Guardando...`;

    // ? Peticion aqui...

    // Resetear el formulario
    formularioNuevoPassword.reset();

    // Mostrar mensaje de exito
    await Swal.fire({
      title: "Contraseña cambiada",
      text: "Se ha cambiado la contraseña correctamente",
      icon: "success",
      confirmButtonText: "Aceptar",
      timer: 3000,
    });

    // Redireccionar al usuario
    window.location.href = "./iniciarSesion.html";
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
  btnNuevoPassword.disabled = false;
  btnNuevoPassword.innerHTML = `Guardar password`;
}
