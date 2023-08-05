<?php

namespace Controllers;

use MVC\Router;
use Model\Compras;
use Model\Usuario;
use Classes\Paginacion;
use Model\Envio;
use Model\Producto;

class RegistrosController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }   
      

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/registros?page=1');
        }
        $registros_por_pagina = 5;
        $total = Compras::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/registros?page=1');
        } 
        
        

        $registros = Compras::paginar($registros_por_pagina, $paginacion->offset()); 
        foreach($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->envio = Envio::find($registro->envio_id);
            $registro->producto = Producto::find($registro->producto_id);
            // debuguear( $registro->producto);
        }

        $router->render('admin/registros/index', [
            'titulo' => 'Registros de Ventas',
            'paginacion' => $paginacion->paginacion(), 
            'registros' => $registros,           
        ]);
    }

    public static function eliminar() {
        if(!is_admin()) {
            header('Location: /login');
        }   
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
    
            $registros = Compras::find($id);
            if ($registros) {
                $resultado = $registros->eliminar();
    
                if ($resultado) {
                    header('Location: /admin/registros');
                    return;
                }
            }
        }
        header('Location: /');
    }
    
}