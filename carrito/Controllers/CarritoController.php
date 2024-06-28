<?php
require_once 'Models/Producto.php';
require_once 'Models/Carrito.php';

class CarritoController {
	private $carrito;
	private $productoController;

	public function __construct() {
		session_start();
		$this -> carrito = new Carrito();
		$this-> productoController = new ProductoController();
	}

	public function agregarProducto($id) {
		$producto = $this -> productoController -> obtenerProductoPorId($id);
		if ($producto) {
			$this -> carrito -> agregarProducto($producto);
		}
	}

	public function eliminarProducto($id) {
		$this->carrito->eliminarProducto($id);
	}

	public function mostrarCarrito() {
		$this -> carrito -> mostrarProductos();
	}

	public function obtenerTotal() {
		return $this->carrito->obtenerTotal();
	}
}