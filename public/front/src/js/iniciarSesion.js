//=============== VARIABLES ===============//
const formularioLogin = document.querySelector("#formulario-login");
const btnLogin = document.querySelector("#login-btn");

//=============== EVENTOS ===============//
formularioLogin.addEventListener("submit", iniciarSesion);

//=============== FUNCIONES ===============//
async function iniciarSesion(e) {
  e.preventDefault();
  // Obtener los datos del formulario
  const { email, password } = Object.fromEntries(new FormData(formularioLogin));
  const recordar = document.querySelector("#recordar");

  // Si los datos estan vacios
  if (email.trim() === "" || password.trim() === "") {
    Swal.fire({
      title: "Campos vacios",
      text: "Todos los campos son obligatorios",
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
    btnLogin.disabled = true;
    btnLogin.innerHTML = `Autenticando...`;

    // ? Peticion aqui...

    // Si el usuario quiere recordar su sesion
    if (recordar.checked) {
      localStorage.setItem("token", "Escriba el token aqui");
    } else {
      localStorage.removeItem("token");
    }

    // Resetear el formulario
    formularioLogin.reset();

    // Mostrar mensaje de exito
    await Swal.fire({
      title: "Bienvenido",
      text: "Iniciaste sesion correctamente",
      icon: "success",
      confirmButtonText: "Aceptar",
      timer: 3000,
    });

    // Redireccionar al usuario
    window.location.href = "/";
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
  btnLogin.disabled = false;
  btnLogin.innerHTML = `Iniciar Sesión`;
}
