//=============== VARIABLES ===============//
const formularioOlvidePassword = document.querySelector(
  "#formulario-olvide-password"
);
const btnOlvidePassword = document.querySelector("#olvide-password-btn");

//=============== EVENTOS ===============//
formularioOlvidePassword.addEventListener("submit", iniciarSesion);

//=============== FUNCIONES ===============//
async function iniciarSesion(e) {
  e.preventDefault();
  // Obtener los datos del formulario
  const { email } = Object.fromEntries(new FormData(formularioOlvidePassword));

  // Si los datos estan vacios
  if (email.trim() === "") {
    Swal.fire({
      title: "Email vacio",
      text: "El email es obligatorio",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Validar el correo
  if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email)) {
    Swal.fire({
      title: "Correo invalido",
      text: "El correo ingresado no es valido",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }
  // Realizar la peticion
  try {
    // Animacion de carga del boton
    btnOlvidePassword.disabled = true;
    btnOlvidePassword.innerHTML = `Enviando...`;

    // ? Peticion aqui...

    // Resetear el formulario
    formularioOlvidePassword.reset();

    // Mostrar mensaje de exito
    await Swal.fire({
      title: "Email enviado",
      text: "Se envio un email a su cuenta, por favor revise su bandeja de entrada.",
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
  btnOlvidePassword.disabled = false;
  btnOlvidePassword.innerHTML = `Enviar Instruciones`;
}
