<?php
// Paginado
require_once 'Models/ProductoPaginado.php';

$nroPorPagina = 6;
$productoPaginado = new ProductoPaginado($nroPorPagina);
$listaProductos = $productoPaginado-> obtenerProductos();
?>

<h1>Productos Disponibles</h1>

<div class="row">
	<?php foreach ($listaProductos as $producto) { ?>
        <div class="col-md-4">
            <div class="card d-flex align-items-center">
                <img src="<?php echo $producto->image; ?>" style="width: 300px; height: 300px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto->title; ?></h5>
                    <p class="card-text"><?php echo $producto->price; ?></p>
                    <button onclick="agregarAlCarrito(<?php echo $producto->id; ?>)" class="btn btn-primary">Agregar al Carrito</button>
                </div>
            </div>
        </div>
	<?php } ?>
</div>

<div class="paginas d-flex justify-content-center">
	<?php $productoPaginado->mostrarPaginas(); ?>
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

<style>
    .paginas ul{
        margin: 10px 0;
        padding: 0;
    }
    .paginas li{
        display: inline-block;
        margin: 0;
        padding: 10px;
    }

    .paginas li a{
        background: rgb(228, 228, 228);
        border-radius: 3px;
        color: rgb(50, 50, 50);
        padding: 10px 15px;
        text-decoration: none;
    }

    .actual{
        background: rgb(20, 69, 124) !important;
        color: rgb(255, 255, 255) !important;
    }
</style>