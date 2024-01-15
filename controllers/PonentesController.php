<?php

namespace Controllers;

use Model\Ponente;
use MVC\Router;

class PonentesController{
    public static function index(Router $router) {
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencias'
        ]);
    }


    public static function crear(Router $router) {
        $alertas = [];
        $ponente = new Ponente;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ponente->sincronizar($_POST);

            // Validar 
            $alertas = $ponente->validar();
        }
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente
        ]);
    }
}

