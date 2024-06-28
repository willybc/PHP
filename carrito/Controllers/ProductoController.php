<?php
require_once 'Models/Producto.php';

class ProductoController {
	private $apiUrl = "https://fakestoreapi.com/products";

	public function obtenerProductos(): array
	{
		$productos = json_decode(file_get_contents($this->apiUrl));

		$productosConvertidos = [];
		foreach ($productos as $producto) {
			$productoConvertido = new Producto(
				$producto->id,
				$producto->title,
				$producto->price,
				$producto->image
			);
			$productosConvertidos[] = $productoConvertido;
		}

		return $productosConvertidos;
	}

	public function obtenerProductoPorId($id) {
		$producto = json_decode(file_get_contents($this->apiUrl . '/' . $id));

		return new Producto(
			$producto->id,
			$producto->title,
			$producto->price,
			$producto->image
		);
	}
}