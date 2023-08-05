<?php

namespace Controllers;


use MVC\Router;
use Model\Usuario;
use Model\Ubicacion;

class PerfilController {
    public static function perfil(Router $router) {
            
        if(!is_auth()) {
            header('Location: /');
            return;
        }
        $alertas = [];
        $ubicacion = Ubicacion::where('usuario_id',$_SESSION['id'] );
        $usuario = Usuario::where('id', $_SESSION['id']);

        $router->render('perfil/perfil', [
            'titulo' => 'Mi Perfil',
            'usuario' => $usuario,
            'ubicacion' => $ubicacion,
            'alertas' => $alertas,
            
        ]);
    }

    public static function modificar(Router $router) {
            
        if(!is_auth()) {
            header('Location: /');
            return;
        }
    
        $alertas = [];
        $ubicacion = Ubicacion::where('usuario_id', $_SESSION['id']);
        $usuario = Usuario::find($_SESSION['id']);
        if(!$usuario) {
            header('Location: /');
            return;
        }
    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
                return;
            }
          
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar_perfil();
    
            if(empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);
    
                if($existeUsuario && $existeUsuario->id !== $usuario->id) {
                    Usuario::setAlerta('error', 'E-mail no válido, ya pertenece a otra cuenta');
                    $alertas = $usuario->getAlertas();
                } else {
                    $usuario->guardar();
                    Usuario::setAlerta('exito', 'Guardado correctamente');
                    $alertas = $usuario->getAlertas();
                }
    
                $ubicacion->usuario_id = $_SESSION['id'];
                $ubicacion->calle = $_POST['calle'] ?? '';
                $ubicacion->comuna = $_POST['comuna'] ?? '';
                $ubicacion->region = $_POST['region'] ?? '';
                $ubicacion->guardar();
            }
        }
    
        $router->render('perfil/modificar', [
            'titulo' => 'Actualiza Perfil',
            'alertas' => $alertas,
            'usuario' => $usuario,
            'ubicacion' => $ubicacion,
        ]);
    }

    public static function direccion(Router $router) {

        if(!is_auth()) {
            header('Location: /');
            return;
        }
    
        $alertas = [];
        $ubicacion = new Ubicacion(); 

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
                return;
            }
            $ubicacion->usuario_id = intval($_SESSION['id']);
            $ubicacion->calle = $_POST['calle'] ?? '';
            $ubicacion->comuna = $_POST['comuna'] ?? '';
            $ubicacion->region = $_POST['region'] ?? '';
            
            $alertas = $ubicacion->validarUbicacion();
            
            if(empty($alertas)) {
                $ubicacion->guardar();
                Ubicacion::setAlerta('exito', 'Guardado correctamente');
                $alertas = $ubicacion->getAlertas();
            }
        }
    
        $router->render('perfil/direccion', [
            'titulo' => 'Agrega Dirección',
            'alertas' => $alertas,
            'ubicacion' => $ubicacion,
        ]);
    }
    

}    