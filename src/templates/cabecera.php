<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodok</title>
    <link rel="stylesheet" href="./styles/index.css"> 
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top narbar-my">
           

            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto justify-content-center"> <!-- Añade la clase justify-content-center aquí -->
                    <li class="nav-item active">
                        <a class="nav-link" href="./listarProducto.php">nuestra carta<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active nav-items-2">
                        <a class= "nav-link" href="#">calificanos<span class="sr-only"></span></a>
                    </li class="nav-item ">

                    <li class="nav-item active">
                        <a class="nav-link" href="#">ubicación<span class="sr-only"></span></a>
                    </li>
                    <li ><img class="ilogo" src="./images/logo.png" alt="logo" width="80" height="80" class="d-inline-block align-text-top logo-my"></li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="MostrarCarritoPage.php" tabindex="-1" aria-disabled="true">
                            <img id="ibolsa"  src="./images/bolsa.png"  width="40" height="40" alt=""> (
                            <?php 
                            echo (empty($_SESSION['carrito'])) ? 0 : count($_SESSION['carrito']);
                            ?> )
                        </a>
                    </li>
                    
                </ul>
            </div>
        </nav>
