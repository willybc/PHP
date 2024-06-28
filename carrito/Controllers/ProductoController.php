<?php
require_once 'Models/Producto.php';

class ProductoController {
	private $apiUrl = "https://dummyjson.com/products";
	private $apiUrlBase = "https://dummyjson.com/products/category/";

	public function obtenerProductos(): array
	{
		$response = json_decode(file_get_contents($this->apiUrl));
		$productos = $response->products;

		$productosConvertidos = [];
		foreach ($productos as $producto) {
			$productoConvertido = new Producto(
				$producto->id,
				$producto->title,
				$producto->price,
				$producto->thumbnail
			);
			$productosConvertidos[] = $productoConvertido;
		}

		return $productosConvertidos;
	}

	public function obtenerProductosPorCategorias(array $categorias): array
	{
		$productosConvertidos = [];

		foreach ($categorias as $categoria) {
			$response = json_decode(file_get_contents($this->apiUrlBase . $categoria));
			$productos = $response->products;

			foreach ($productos as $producto) {
				$productoConvertido = new Producto(
					$producto->id,
					$producto->title,
					$producto->price,
					$producto->thumbnail
				);
				$productosConvertidos[] = $productoConvertido;
			}
		}

		return $productosConvertidos;
	}

	public function obtenerProductoPorId($id) {
		$producto = json_decode(file_get_contents($this->apiUrl . '/' . $id));

		return new Producto(
			$producto->id,
			$producto->title,
			$producto->price,
			$producto->thumbnail
		);
	}
}