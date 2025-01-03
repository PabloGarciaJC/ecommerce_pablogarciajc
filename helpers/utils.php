<?php

class Utils
{
  //muestro errores modal
  public static function setearMensajeError($idMensaje, $mensajeError)
  {
    return "<script>document.getElementById('$idMensaje').innerHTML='<strong>Error,</strong> $mensajeError';</script>";
  }

  public static function accesoUsuarioRegistrado()
  {
    if (!isset($_SESSION['usuarioRegistrado'])) {
      header("Location:" . BASE_URL);
    }
  }

  public static function obtenerUsuario()
  {
    require_once 'model/usuario.php';
    if (isset($_SESSION['usuarioRegistrado']->Id)) {
      $obtenertodos = new usuario;
      $obtenertodos->setId($_SESSION['usuarioRegistrado']->Id);
      $usuarioPorId = $obtenertodos->obtenerTodosPorId();
      return $usuarioPorId;
    }
  }

  public static function obtenerPaisActual($paisActual)
  {
    require_once 'model/paises.php';
    $paisesActual = new Paises();
    $paisesActual->setPais($paisActual);
    $queryPaisActual = $paisesActual->obtenerPaisActual();
    return $queryPaisActual;
  }

};
