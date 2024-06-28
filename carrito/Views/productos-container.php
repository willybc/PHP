<?php
$productoController = new ProductoController();
$listaProductos = $productoController->obtenerProductos();
?>

<h1>Productos Disponibles</h1>

<div class="row">
	<?php foreach($listaProductos as $producto) { ?>
        <div class="col-md-4">
            <div class="card d-flex align-items-center">
                <img src="<?php echo $producto->image; ?>" style="width: 300px; height: 300px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto->title; ?></h5>
                    <p class="card-text"><?php echo $producto->price; ?></p>
                    <button onclick="agregarAlCarrito(<?php echo $producto->id; ?>)" class="btn btn-primary">Agregar al
                        Carrito
                    </button>
                </div>
            </div>
        </div>
	<?php } ?>
</div>

<script>
    function agregarAlCarrito(idProducto) {
        $.ajax({
            url: 'web.php',
            method: 'POST',
            data: {id: idProducto, action: 'agregarProductoAlCarrito'},
            success: function (response) {
                $('#carrito').html(response);
            }

        })
    }
</script>