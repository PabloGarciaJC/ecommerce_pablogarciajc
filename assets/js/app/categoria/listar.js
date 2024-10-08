
let mdFormularioListarCategoria = document.getElementById('mdFormularioListarCategoria');

if (mdFormularioListarCategoria) {

  mdFormularioListarCategoria.addEventListener('submit', (e) => {
    e.preventDefault(); // Freno Submit o Envío;

    let listarCategoria = $('#listarCategoria').val();
    let listarSubcategoria = $('#listarSubcategoria').val();

    // Validacion
    if (listarCategoria == null || listarCategoria == '') {
      mostrarMensajeError('errorListarCategoria', 'Ingrese Categoria');
    } else {
      mostrarMensajeError('errorListarCategoria', '');
    }

    // Funcion para Mostrar y Borrar los Mensajes:
    function mostrarMensajeError(claseInput, mensaje) {
      let elemento = document.querySelector(`.${claseInput}`);
      elemento.lastElementChild.innerHTML = mensaje;
    }

    // Registro Usuario Ajax
    $.ajax({
      type: 'POST',
      url: baseUrl + 'Categoria/listar',
      data: 'listarCategoria=' + listarCategoria + '&listarSubcategoria=' + listarSubcategoria,
    })
      .done(function (response) {
        $("#respuestaPhplistarCategoria").html(response);
        if (response == 1) {
          Swal.fire({
            title: 'Registro Completo',
            icon: 'success',
            timer: 500,
            showConfirmButton: false
          }).then(function () {
            window.location = baseUrl + "Categoria/gestionarCategorias";
          });
        }
      })
  });



}
