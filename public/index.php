<?php 

use MVC\Router;
use Controllers\AuthController;
use Controllers\PerfilController;
use Controllers\PaginasController;
use Controllers\RegalosController;
use Controllers\DashboardController;
use Controllers\ProductosController;
use Controllers\FinalizaCompraController;
use Controllers\RegistrosController;

require_once __DIR__ . '/../includes/app.php';


$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);
// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);
// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);
// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);
// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);
// Perfil Usuario
$router->get('/perfil', [PerfilController::class, 'perfil']);
$router->get('/modifica-perfil', [PerfilController::class, 'modificar']);
$router->post('/modifica-perfil', [PerfilController::class, 'modificar']);
$router->get('/direccion', [PerfilController::class, 'direccion']);
$router->post('/direccion', [PerfilController::class, 'direccion']);


// Area de administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/productos', [ProductosController::class, 'index']);
$router->get('/admin/productos/crear', [ProductosController::class, 'crear']);
$router->post('/admin/productos/crear', [ProductosController::class, 'crear']);
$router->get('/admin/productos/editar', [ProductosController::class, 'editar']);
$router->post('/admin/productos/editar', [ProductosController::class, 'editar']);
$router->post('/admin/productos/eliminar', [ProductosController::class, 'eliminar']);


// Area Compras
$router->post('/compra/finalizar/gratis', [FinalizaCompraController::class, 'gratis']);
$router->post('/compra/finalizar/pagar', [FinalizaCompraController::class, 'pagar']);
$router->post('/compra/finalizar', [FinalizaCompraController::class, 'finalizar']);
$router->post('/carrito/crear', [FinalizaCompraController::class, 'crear']);
$router->get('/carrito', [FinalizaCompraController::class, 'carrito']);
$router->post('/carrito', [FinalizaCompraController::class, 'carrito']);
$router->post('/compra/carrito/eliminar', [FinalizaCompraController::class, 'eliminar']);


// Boleto virtual
$router->get('/boleto', [FinalizaCompraController::class, 'boleto']);

$router->get('/admin/regalos', [RegalosController::class, 'index']);
$router->get('/admin/registros', [RegistrosController::class, 'index']);
$router->post('/admin/registros/eliminar', [RegistrosController::class, 'eliminar']);

// Para Publicos
$router->get('/', [PaginasController::class, 'index']);
$router->get('/detalle_producto', [PaginasController::class, 'detalle']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/404', [PaginasController::class, 'error']);



$router->comprobarRutas();