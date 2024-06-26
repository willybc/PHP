<!doctype html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/index.css">-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="height: 100%">
<?php
require_once 'Controllers/ProductoController.php';
require_once 'Controllers/CarritoController.php';

$carrito = new CarritoController();
?>

<nav class="navbar navbar-dark" style="height: 6vh; background-color: #7ABA78;">
    <div class="container">
        <a class="navbar-brand" style="color: white;">Carrito</a>
        <button class="btn" id="cartButton" style="background-color: #7ABA78; border-color: #7ABA78; color: white;">
            <i class="fa-solid fa-cart-shopping"></i>
        </button>
    </div>
</nav>

<div class="container container-paginacion"
     style="min-height: 94vh; display: flex; flex-direction: column; justify-content: center;">
	<?php include("./Views/productos-container.php"); ?>

	<?php include("./Views/carrito-container.php"); ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>