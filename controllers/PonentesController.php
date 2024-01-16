<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController{
    public static function index(Router $router) {
        $ponentes = Ponente::all();
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencias',
            'ponentes' => $ponentes
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

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true)); // genera nombre aleatorio

                $_POST['imagen'] = $nombre_imagen;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $ponente->sincronizar($_POST);

            // Validar 
            $alertas = $ponente->validar();

            // Guardar registro
            if(empty($alertas)){
                // guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la base de datos
                $resultado = $ponente->guardar();
                if($resultado){
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente
        ]);
    }
}

