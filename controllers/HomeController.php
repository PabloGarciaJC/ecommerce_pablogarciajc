<?php

require_once 'model/productos.php';
require_once 'model/categorias.php';
require_once 'controllers/ProductoController.php';
require_once 'model/idiomas.php';

class HomeController
{

    private function cargarDatosComunes()
    {
        $usuario = Utils::obtenerUsuario();
        $categorias = new Categorias();
        $idiomas = new Idiomas();
        $getIdiomas = $idiomas->obtenerTodos();
        $lang = isset($_POST['lenguaje']) ? $_POST['lenguaje'] : false;

        if ($lang) {
            $_SESSION['lang'] = $lang;
        } elseif (!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = 'es';
        }

        // Carga el archivo del idioma según la selección
        switch ($_SESSION['lang']) {
            case 'en':
                require_once 'lenguajes/ingles.php';
                $categorias->setIdioma(2);
                break;
            case 'fr':
                require_once 'lenguajes/frances.php';
                $categorias->setIdioma(3);
                break;
            default:
                require_once 'lenguajes/espanol.php';
        }

        $categoriasConSubcategoriasYProductos = $categorias->obtenerCategoriasYProductos();
        return compact('usuario', 'categoriasConSubcategoriasYProductos', 'getIdiomas');
    }

    public function index()
    {
        extract($this->cargarDatosComunes());
        require_once 'views/layout/head.php';
        require_once 'views/layout/header.php';
        require_once 'views/layout/search.php';
        $producto = new ProductoController();
        require_once 'views/home/slider.php';
        require_once 'views/home/body.php';
        require_once 'views/layout/footer.php';
    }

    public function nosotros()
    {
        extract($this->cargarDatosComunes());
        require_once 'views/layout/head.php';
        require_once 'views/layout/header.php';
        require_once 'views/home/nosotros.php';
        require_once 'views/layout/footer.php';
    }

    public function help()
    {
        extract($this->cargarDatosComunes());
        require_once 'views/layout/head.php';
        require_once 'views/layout/header.php';
        require_once 'views/home/help.php';
        require_once 'views/layout/footer.php';
    }

    public function faqs()
    {
        extract($this->cargarDatosComunes());
        require_once 'views/layout/head.php';
        require_once 'views/layout/header.php';
        require_once 'views/home/faqs.php';
        require_once 'views/layout/footer.php';
    }

    public function term()
    {
        extract($this->cargarDatosComunes());
        require_once 'views/layout/head.php';
        require_once 'views/layout/header.php';
        require_once 'views/home/term.php';
        require_once 'views/layout/footer.php';
    }

    public function privacy()
    {
        extract($this->cargarDatosComunes());
        require_once 'views/layout/head.php';
        require_once 'views/layout/header.php';
        require_once 'views/home/privacy.php';
        require_once 'views/layout/footer.php';
    }

    public function contactanos()
    {
        extract($this->cargarDatosComunes());
        require_once 'views/layout/head.php';
        require_once 'views/layout/header.php';
        require_once 'views/home/contacto.php';
        require_once 'views/layout/footer.php';
    }
}
