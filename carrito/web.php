<?php
require_once 'Controllers/CarritoController.php';
require_once 'Controllers/ProductoController.php';

$carritoController = new CarritoController();
$productoController = new ProductoController();

$action = $_POST['action'] ?? '';

switch ($action) {
	case 'agregarProductoAlCarrito':
		$idProducto = $_POST['id'];
		$carritoController->agregarProducto($idProducto);
		$carritoController->mostrarCarrito();
		break;

	case 'eliminarProductoAlCarrito':
		$idProducto = $_POST['id'];
		$carritoController->eliminarProducto($idProducto);
		$carritoController->mostrarCarrito();
		break;

	default:
		$carritoController->mostrarCarrito();
		break;
}
?>