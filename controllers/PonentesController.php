<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

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
            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes ='../public/img/speakers';

                // crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen'])-> fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen'])-> fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true)); // genera nombre aleatorio

                $_POST['imagen'] = $nombre_imagen;
            }

            $ponente->sincronizar($_POST);

            // Validar 
            $alertas = $ponente->validar();

            // Guardar registro
            
        }
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente
        ]);
    }
}

