<?php

namespace Controllers;

use MVC\Router;
use Model\Carrito;
use Model\Envio;
use Model\Producto;


class FinalizaCompraController {
    public static function crear(Router $router) {
        if (!is_auth()) {
            header('Location: /login');
            return;
        }
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto = $_POST['id'];
            $usuario = $_SESSION['id'];

            $carrito = new Carrito([
                'producto_id' => $producto,
                'usuario_id' => $usuario,
            ]);
            $resultado = $carrito->guardar();

            if ($resultado) {
                header('Location: /carrito');
                return;
            } else {
                Carrito::setAlerta('error', 'Error de Añadir');
            }
        }
        $alertas = carrito::getAlertas();

        $router->render('carrito', [
            'titulo' => 'Carrito',
            'alertas' => $alertas,

        ]);
    }
    
    public static function carrito(Router $router) {
        if (!is_auth()) {
            header('Location: /login');
            return;
        }
        $usuario = $_SESSION['id'];
        $carritos = Carrito::whereInt('usuario_id', $usuario);
        $entrega = 1000;
        $presencial = 0;
        
        $productos = [];
        $totalAPagar = 0;
        

        foreach ($carritos as $carrito) {
            $producto = Producto::find($carrito->producto_id);
            if ($producto) {
                $productos[] = $producto;

                $subtotal = $producto->precio;
                $totalAPagar += $subtotal;
            }
        }   
        $router->render('compra/carrito', [
            'titulo' => 'Carrito',
            'productos' => $productos,
            'carrito' => $carrito ?? '',
            'totalAPagar' => $totalAPagar,
            'entrega' => $entrega,
            'presencial' => $presencial,
        ]);
    }
    
    

    public static function eliminar() {
        if (!is_auth()) {
            header('Location: /login');
            return;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
    
            $carrito = Carrito::find($id);
            if ($carrito) {
                $resultado = $carrito->eliminar();
    
                if ($resultado) {
                    header('Location: /carrito');
                    return;
                }
            }
        }
        header('Location: /');
    }
    






    // public static function finalizar(Router $router) {

    //     if(!is_auth()) {
    //         header('Location: /login');
    //         return;
    //     }

    //     $compra = Compras::where('usuario_id', $_SESSION['id']);

    //     if(isset($compra) && ($compra->envio_id === "1" )) {
    //         header('Location: /boleto?id=' . urlencode($compra->token));
    //         return;
    //     }

    //     if(isset($compra) && ($compra->envio_id === "2") {
    //         header('Location: /compra/finalizar');
    //         return;
    //     }

    //     $router->render('compra/finalizada/finalizar', [
    //         'titulo' => 'Finalizar Compras'
    //     ]);
    // }


    


    // public static function boleto(Router $router) {

    //     // Validar la URL
    //     $id = $_GET['id'];

    //     if(!$id || !strlen($id) === 8 ) {
    //         header('Location: /');
    //         return;
    //     }

    //     // buscarlo en la BD
    //     $compra = Compras::where('token', $id);
    //     if(!$compra) {
    //         header('Location: /');
    //         return;
    //     }
    //     // Llenar las tablas de referencia
    //     $compra->usuario = Usuario::find($compra->usuario_id);
    //     $compra->envio = Envio::find($registro->paquete_id);

    //     $router->render('registro/boleto', [
    //         'titulo' => 'Asistencia a DevWebCamp',
    //         'registro' => $registro
    //     ]);
    // }

}