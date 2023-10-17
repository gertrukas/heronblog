/**
 * @param {Date} date Formatea fecha
 * @return {string} Fecha formateada
 */
export const fomatearFecha = (fecha) => {
  let nuevaFecha;
  if (fecha.includes("T00:00:00.000Z")) {
    nuevaFecha = new Date(fecha.split("T")[0].split("-"));
  } else {
    nuevaFecha = new Date(fecha);
  }
  const opciones = {
    year: "numeric",
    month: "long",
    day: "numeric",
  };
  return nuevaFecha.toLocaleDateString("es-ES", opciones);
};

/**
 * @param {number} cantidad Formatear dinero
 * @return {string} Monto
 */
export const formatearDinero = (cantidad) => {
  return cantidad.toLocaleString("es-PE", {
    style: "currency",
    currency: "PEN",
  });
};
