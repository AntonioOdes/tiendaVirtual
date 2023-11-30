<?php
include('../../config/config.php');
include('../../config/connection.php');
include('../carritoProducto.php');
include('../templates/cabecera.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css"> 
    <title>Productos</title>
</head>
<body>
<br>
<section class="section-menu">
    <section class="contenido">
      <h4>Lista del carrito</h4>
      <?php if (!empty($_SESSION['carrito'])) { ?>
    <table class="table table-light">
        <tbody>
            <tr>
                <th width="15%">Descripción</th>
                <th width="15%">id</th>
                <th width="15%">Cantidad</th>
                <th width="20%">Precio</th>
                <th width="20%">Total</th>
                <th width="5%">--</th>
            </tr>
            <?php
            $total = 0;
            $cantidad = 0;
            $productosAgrupados = [];

            foreach ($_SESSION['carrito'] as $indice => $producto) {
                // Verificar si el ID ya ha sido procesado
                if (array_key_exists($producto['id'], $productosAgrupados)) {
                    // Si ya existe, incrementar la cantidad
                    $productosAgrupados[$producto['id']]['cantidad']++;
                } else {
                    // Si no existe, agregar a la lista
                    $productosAgrupados[$producto['id']] = $producto;
                    $productosAgrupados[$producto['id']]['cantidad'] = 1;
                }
            }

            foreach ($productosAgrupados as $producto) {
                ?>

                <tr>
                    <td width="15%"><?php echo $producto['nombre'] ?></td>
                    <td width="15%"><?php echo $producto['id'] ?></td>
                    <td width="15%"><?php echo $producto['cantidad'] ?></td>
                    <td width="15%"><?php echo $producto['precio'] ?></td>
                    <td width="20%"><?php echo number_format($producto['precio'] * $producto['cantidad'], 2) ?></td>
                    <td width="5%">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                            <button class="btn btn-danger" type="submit" name="btnAccion" value="EliminarProductoCarrito">Eliminar</button>
                        </form>
                    </td>
                </tr>

                <?php
                $total += ($producto['precio'] * $producto['cantidad']);
            } ?>

            <tr>
                <td colspan="3" align="right"><h3>Total</h3></td>
                <td align="right"><h3>$<?php echo number_format($total, 2); ?></h3></td>
            </tr>
            <tr>
                <td colspan="6">
                    <form class="" action="pagar.php" method="post">
                        <div class="alert alert-success">
                            <div class="form-group">
                                <label for="email">Correo de contacto:</label>
                                <input id="email" class="form-control" type="email" name="email" placeholder="Ingrese su correo" required>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">Los productos se enviarán a este correo.</small>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" id type="submit" value="proceder" name="btnAccion">Proceder a pagar >></button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

<?php } else { ?>
    <div class="alert alert-success">No hay productos en el carrito.</div>
<?php } ?>


    </section>

</section>

<?php
include('../templates/pie.php');
?>