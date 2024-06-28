<?php

class Carrito
{
	private $productos;

	public function __construct()
	{
		if(isset($_SESSION['carrito'])) {
			$this->productos = $_SESSION['carrito'];
		} else {
			$this->productos = array();
		}
	}

	public function __destruct()
	{
		$_SESSION['carrito'] = $this->productos;
	}

	public function agregarProducto(Producto $nuevoProducto)
	{
		foreach($this->productos as $producto) {
			if($producto->id == $nuevoProducto->id) {
				$producto->cantidad += $nuevoProducto->cantidad;
				return;
			}
		}
		$this->productos[] = $nuevoProducto;
	}

	public function eliminarProducto($idProducto)
	{
		foreach($this->productos as $index => $producto) {
			if($producto->id == $idProducto) {
				unset($this->productos[$index]);
				$this->productos = array_values($this->productos);
				return;
			}
		}
	}

	public function obtenerTotal()
	{
		$total = 0;
		foreach($this->productos as $producto) {
			$total += $producto->getTotal();
		}
		return $total;
	}

	public function mostrarProductos()
	{
		foreach($this->productos as $producto) { ?>
            <div class="card" style="display: grid; grid-template-columns: 20% 70% 10%; justify-items: center; align-items: center;">
                <!--<div class="card-count">
                    <?php /*= $producto->cantidad; */?>
                </div>-->
                <div class="card-image">
                    <img src="<?= $producto->image; ?>" style="height: 110px;">
                </div>
                <div class="card-content d-flex" style="width: 100%; justify-content: space-around;">
                    <div>
						<?= $producto->title; ?>
                    </div>
                    <div>
                        <strong><?= $producto->price; ?></strong>
                    </div>
                </div>
                <div class="card-action">
                    <i class="fa-solid fa-trash" onclick='eliminarDelCarrito(<?= $producto->id; ?>)' style="color: #dc3545; cursor: pointer;"></i>
                </div>
            </div>
		<?php }
	}

}

