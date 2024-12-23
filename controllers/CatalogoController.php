<?php

require_once 'model/productos.php';
require_once 'model/categorias.php';
require_once 'model/categorias.php';
require_once 'model/pedidos.php';
require_once 'model/lineaPedidos.php';
require_once 'model/paises.php';

class CatalogoController extends HomeController
{
  public function index()
  {
    $this->idiomas();
    $categoriaId = isset($_GET['categoriaId']) ? $_GET['categoriaId'] : false;
    $minPrecio = isset($_GET['minPrecio']) ? $_GET['minPrecio'] : false;
    $maxPrecio = isset($_GET['maxPrecio']) ? $_GET['maxPrecio'] : false;
    $textoBusqueda = isset($_GET['textoBusqueda']) ? $_GET['textoBusqueda'] : false;

    $usuario = Utils::obtenerUsuario();
    $categorias = new Categorias();

    // Menu de Navegacion
    $categoriasConSubcategoriasYProductos = $categorias->obtenerCategoriasYProductos();
    $categorias->setId($categoriaId);
    $getCategorias = $categorias->obtenerSubcategorias($minPrecio, $maxPrecio, $textoBusqueda);

    // Mostrar breadcrumbs
    $breadcrumbs = $categorias->getBreadcrumbs();

    require_once 'views/layout/head.php';
    require_once 'views/layout/header.php';
    require_once 'views/layout/search.php';
    require_once 'views/catalogo/index.php';
    require_once 'views/layout/footer.php';
  }
}
