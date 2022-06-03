<?php
$subtotal=0;
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>GUIA5</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body> 
<div class="container mt-4">
    <div class="card bg-light">
        <div class="card-header">
            <center><h1>CARRITO</h1></center>
        </div>
        <div class="card-body">
            <div>
            <a class="btn btn-success bi-back" href="index.php" role="button">Agragar otro Producto</a>
            </div>
            <table class="table table-hover " border="1">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>IMPORTE</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION["CARRITO"] as $elemento){
                    $importe=sprintf('%.2f', $elemento["importe"]);
                ?>
                <tr>
                    <td><?php echo $elemento["nombre"]?></td>
                    <td><?php echo $elemento["precio"]?></td>
                    <td><?php echo $elemento["cantidad"]?></td>
                    <td><?php echo $importe?></td>
                    <td>
                        <form action="carrito.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $elemento["id"] ?>">
                            <button type="submit" class="btn btn-danger" name="Eliminar" value="Eliminar">Eliminar </button>
                        </form>
                    </td>
                </tr>
                <?php $subtotal +=$elemento["importe"];
                } $IVA=$subtotal*0.12;
                $total=$subtotal+$IVA;
                $subtotal=sprintf('%.2f', $subtotal);
                $IVA=sprintf('%.2f', $IVA);
                $total=sprintf('%.2f', $total);
                ?>
            </tbody>    
            <tfoot>
                <tr><th colspan="4" style="text-align:right;">Subtotal:</th><th style="text-align:right;"><?php echo $subtotal;?></th></tr>
                <tr><th colspan="4" style="text-align:right;">IVA:</th><th style="text-align:right;"><?php echo $IVA;?></th></tr>
                <tr><th colspan="4" style="text-align:right;">Total:</th><th style="text-align:right;"><?php echo $total;?></th></tr>
            </tfoot>    
        </table>
        <div class="col-md-9">
        </div>
        <div class="col-md-2">
                <form action="pagar.php" method="POST">
                    <input type="hidden" name="subtotal" value="<?php echo $subtotal ?>">
                    <input type="hidden" name="iva" value="<?php echo $IVA ?>">
                    <input type="hidden" name="total" value="<?php echo $total ?>">
                    <button type="submit" class="btn btn-primary" name="Pagar" value="Pagar">Pagar</button>
                </form>
        </div>
        <h6>
            <?php if(empty($_SESSION["CARRITO"])){
                echo "</br>No se han encontrado elementos";
            }?>
        </h6>
    </div>
</div>
</body> 