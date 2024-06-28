<?php

class Carrito {
	private $productos;

	public function __construct() {
		if ( isset($_SESSION['carrito'])) {
			$this -> productos = $_SESSION['carrito'];
		} else {
			$this -> productos = array();
		}
	}

	public function __destruct() {
		$_SESSION['carrito'] = $this -> productos;
	}

	public function agregarProducto(Producto $nuevoProducto) {
		foreach ($this -> productos as $producto) {
			if ($producto -> id == $nuevoProducto -> id) {
				$producto -> cantidad += $nuevoProducto -> cantidad;
				return;
			}
		}
		$this -> productos[] = $nuevoProducto;
	}

	public function eliminarProducto($idProducto) {
		foreach ($this -> productos as $index => $producto) {
			if ($producto -> id == $idProducto) {
				unset($this -> productos[$index]);
				$this -> productos = array_values($this -> productos);
				return;
			}
		}
	}

	public function obtenerTotal() {
		$total = 0;
		foreach ($this -> productos as $producto) {
			$total += $producto -> getTotal();
		}
		return $total;
	}

	public function mostrarProductos() {
		foreach ($this->productos as $producto) {
			echo "ID: " . $producto->id . ", Producto: " . $producto->title . ", Precio: " . $producto->price .
				" <button onclick='eliminarDelCarrito(" . $producto->id . ")'>Eliminar</button></br>";
		}
	}

}

