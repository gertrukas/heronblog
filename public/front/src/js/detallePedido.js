//=============== VARIABLES ===============//
const formularioDetalle = document.querySelector("#formulario-detalle");

//=============== EVENTOS ===============//
formularioDetalle.addEventListener("submit", iniciarSesion);

//=============== FUNCIONES ===============//
async function iniciarSesion(e) {
  e.preventDefault();
  // Obtener los datos del formulario
  const data = Object.fromEntries(new FormData(formularioDetalle));

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

  // Validar direccion
  if (data.direccion.trim().length < 3 || data.direccion.trim().length > 50) {
    Swal.fire({
      title: "Direccion invalida",
      text: "La direccion debe tener al menos 3 caracteres y maximo 50",
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

  // Validar cuidad
  if (data.ciudad.trim().length < 3 || data.ciudad.trim().length > 20) {
    Swal.fire({
      title: "Ciudad invalida",
      text: "La ciudad debe tener al menos 3 caracteres y maximo 20",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Validar provincia
  if (data.provincia.trim().length < 3 || data.provincia.trim().length > 20) {
    Swal.fire({
      title: "Provincia invalida",
      text: "La provincia debe tener al menos 3 caracteres y maximo 20",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Validar codigo postal
  if (!/^\d{5}$/.test(data.codigoPostal)) {
    Swal.fire({
      title: "Codigo postal invalido",
      text: "El codigo postal debe tener 4 digitos",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Validar pais
  if (data.pais.trim().length < 3 || data.pais.trim().length > 20) {
    Swal.fire({
      title: "Pais invalido",
      text: "El pais debe tener al menos 3 caracteres y maximo 20",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Validar distrito
  if (data.distrito.trim().length < 3 || data.distrito.trim().length > 20) {
    Swal.fire({
      title: "Distrito invalido",
      text: "El distrito debe tener al menos 3 caracteres y maximo 20",
      icon: "info",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Redireccionar al usuario
  window.location.href = "./pagar.html";
}
