<?php
    include("conexion.php");
    session_start();
    $con =mysqli_connect($serverName,$userName,$pwd,$BD);
    $sql="Select * from producto;";
    $result=mysqli_query($con, $sql);

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
            <center><h1>Lista</h1></center>
        </div>
        <div class="card-body">
            <div>
            <a class="btn btn-success bi-back" href="producto.php" role="button">Nuevo Producto</a>
            </div>
            <table class="table table-hover " border="1">
            <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($row=mysqli_fetch_assoc($result)){
            ?>    
            <tr>
                <th><?php echo $row["nombre"]; ?></th>
                <td>$<?php echo $row["precio"]; ?></td>
                <td>
                    <form action="carrito.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                    <button type="submit" class="btn btn-primary" name="Agregar" value="Agregar">Agregar</button>
                    </form>
                <td>
            </tr>
            <?php
            }
            mysqli_close($con);
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>