// Obtengo Valor de Buscador
let buscadorProductos = document.getElementById("buscadorProductos");

if (buscadorProductos) {
  // Inicia en Vacio
  let valorBuscadorProductos = "";

  // Inicia en Vacio
  let paginaActualBuscadorProductos = 1;

  // Carga Primero
  ajaxBuscadorProductos(paginaActualBuscadorProductos, valorBuscadorProductos);

  // Obtener Tiempo Real Datos Buscador
  buscadorProductos.addEventListener("keyup", (event) => {
   

    let valorBuscadorProductos = event.target.value;

    ajaxBuscadorProductos(
      paginaActualBuscadorProductos,
      valorBuscadorProductos
    );
  });

  // Function  Ajax
  function ajaxBuscadorProductos(
    paginaActualBuscadorProductos,
    valorBuscadorProductos
  ) {
    $.ajax({
      type: "POST",
      url: baseUrl + "Producto/buscador",
      data: {
        paginaActualBuscadorProductos: paginaActualBuscadorProductos,
        buscadorProductos: valorBuscadorProductos,
      },
    }).done(function (response) {
      $("#respuestaPhpBuscadorProductos").html(response);
    });
  }
}
