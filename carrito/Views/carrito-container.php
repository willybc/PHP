<div id="cartSidebar" class="cart-sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a>
    <div class="cart-sidebar-content">
        <h1>Carrito</h1>
        <div id="cart-items">
			<?php $carrito->mostrarCarrito(); ?>
        </div>
    </div>
</div>

<style>
    .cart-sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        top: 0;
        right: 0;
        background-color: white;
        overflow-x: hidden;
        transition: 0.5s;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .cart-sidebar-content {
        padding: 20px;
    }

    .cart-sidebar .closebtn {
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        cursor: pointer;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
    }
</style>

<script>
    function eliminarDelCarrito(idProducto) {
        $.ajax({
            url: 'web.php',
            method: 'POST',
            data: {id: idProducto, action: 'eliminarProductoAlCarrito'},
            success: function (response) {
                $('#carrito').html(response);
            }
        });
    }

    $(document).ready(function () {
        $('#cartButton').on('click', function () {
            openCart();
            $.ajax({
                url: 'web.php',
                method: 'POST',
                data: {action: 'mostrarCarrito'},
                success: function (response) {
                    $('#cart-items').html(response);
                }
            });
        });
    });

    function openCart() {
        document.getElementById("cartSidebar").style.width = "600px";
    }

    function closeCart() {
        document.getElementById("cartSidebar").style.width = "0";
    }
</script>