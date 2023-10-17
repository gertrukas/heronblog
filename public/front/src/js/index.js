
//=============== VARIABLES ===============//
const presentacion_items = document.querySelectorAll(".presentacion__item");
let contador = 0;
if ( presentacion_items.length != 0) {


  //=============== FUNCIONES ===============//
  // Esta funcion anima el banner de presentacion en la pagina de inicio
  const animarBanner = () => {
    if (contador === presentacion_items.length) contador = 0; // Resetea el contador

    // Remover las clases active
    presentacion_items.forEach((item) => {
      item.classList.remove("active");
    });
    // Agregar la clase active
    presentacion_items[contador].classList.add("active");
    contador += 1;
  };
  setInterval(() => {
    animarBanner();
  }, 3000);

}