<?php
// Paginado
require_once 'Models/ProductoPaginado.php';

$nroPorPagina = 8;
$productoPaginado = new ProductoPaginado($nroPorPagina);
$listaProductos = $productoPaginado->obtenerProductos();
?>

<div class="row">
	<?php foreach($listaProductos as $producto) { ?>
        <div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom: 1.5rem">
            <div class="card d-flex align-items-center">
                <img src="<?php echo $producto->image; ?>" style="height: 200px;">
                <div class="card-body d-flex" style="flex-direction: column">
                    <h5 class="card-title fixed-height text-center"><?php echo $producto->title; ?></h5>
                    <p class="card-text text-center"><?php echo $producto->price; ?></p>
                    <button onclick="agregarAlCarrito(<?php echo $producto->id; ?>)" class="btn"
                            style="background-color: rgb(20, 69, 124); color: white;">Agregar al Carrito
                    </button>
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
    .paginas ul {
        margin: 10px 0;
        padding: 0;
    }

    .paginas li {
        display: inline-block;
        margin: 0;
        padding: 10px;
    }

    .paginas li a {
        background: rgb(228, 228, 228);
        border-radius: 3px;
        color: rgb(50, 50, 50);
        padding: 10px 15px;
        text-decoration: none;
    }

    .actual {
        background: rgb(20, 69, 124) !important;
        color: rgb(255, 255, 255) !important;
    }

    .fixed-height {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 2.4em;
    }
</style>