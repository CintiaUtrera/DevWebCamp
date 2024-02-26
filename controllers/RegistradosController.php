<?php

namespace Controllers;

use MVC\Router;

class RegistradosController{
    public static function index(Router $router) {
        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados'
        ]);
    }


    public static function gratis(Router $router) {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()) {
                header('Location: /login');
            }

            $token = uniqid(rand(), true);
        }
    }



}