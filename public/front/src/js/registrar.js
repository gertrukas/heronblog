//=============== VARIABLES ===============//
const formularioRegistro = document.querySelector("#formulario-registrar");
const btnRegistar = document.querySelector("#registrar-btn");

//=============== EVENTOS ===============//
formularioRegistro.addEventListener("submit", iniciarSesion);

//=============== FUNCIONES ===============//
async function iniciarSesion(e) {
  e.preventDefault();
  // Obtener los datos del formulario
  const data = Object.fromEntries(new FormData(formularioRegistro));

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

  // La contraseña debe tener al menos 6 caracteres
  if (data.password.length < 6) {
    Swal.fire({
      title: "Contraseña demasiado corta",
      text: "La contraseña debe tener al menos 6 caracteres",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Si la contraseña no coincide
  if (data.password !== data.confirmarPassword) {
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
    btnRegistar.disabled = true;
    btnRegistar.innerHTML = `Registrando...`;

    // ? Peticion aqui...
    console.log(data);

    // Resetear el formulario
    formularioRegistro.reset();

    // Mostrar mensaje de exito
    await Swal.fire({
      title: "Registro exitoso",
      text: "Se ha registrado correctamente",
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
  btnRegistar.disabled = false;
  btnRegistar.innerHTML = `Registrar`;
}
