<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;


class RegistroController{
    public static function crear(Router $router) {
    
    $router->render('registro/crear', [
        'titulo' => 'Finalizar Registro'
    ]);
    
    }


    public static function gratis() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!is_auth()) {
                header('Location: /login');
            }

            $token = substr(md5(uniqid( rand(), true)), 0, 8);

            // Crear Registro
            $datos = array(
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );

            $registro = new Registro('datos');
            $resultado = $registro->guardar();

            if($resultado){
                header('Location: /boleto?id=' . urlencode($registro->token));
            }
        }
    }
}