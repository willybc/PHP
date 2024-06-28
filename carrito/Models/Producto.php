<?php

class Producto {
	public $id;
	public $title;
	public $price;
	public $cantidad;
	public $image;

	public function __construct($id, $nombre, $precio, $image, $cantidad = 1) {
		$this -> id = $id;
		$this -> title = $nombre;
		$this -> price = $precio;
		$this -> cantidad = $cantidad;
		$this -> image = $image;
	}

	public function getTotal() {
		return $this -> price * $this -> cantidad;
	}
}