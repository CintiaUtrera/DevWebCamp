<?php

namespace Controllers;

use MVC\Router;

class PonentesController{
    public static function index(Router $router) {
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencias'
        ]);
    }


    public static function crear(Router $router) {
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registar Ponente'
        ]);
    }
}

