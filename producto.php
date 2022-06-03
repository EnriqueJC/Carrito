<?php
    $serverName="localhost";
    $userName="root";
    $pwd="";
    $BD="tienda";
    $con =mysqli_connect($serverName,$userName,$pwd,$BD);
?>
<!DOCTYPE html>
<html>
<head>
    <title>GUIA5</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btnEnviar").click(function(){
                var nombre=$("#txtNombre").val();
                var precio=$("#txtPrecio").val();
                $.ajax({
                    type:'post',
                    url: 'envio.php',
                    data: {"nombre":nombre,"precio":precio},
                    beforeSend: function(response){
                    },
                    success: function(response){
                        $("#respuesta").html(response);
                    }, error: function(response){
                        $("#respuesta").html(response);
                    }
                });
            });
        });
    </script>
</head>
<body> 
    <div class="container mt-4 col-lg-4">
        <div class="card bg-light">
            <div class="card-header">
                <center><h1>PRODUCTO</h1></center>
            </div>
            <div class="card-body">
                <label>Producto</label></br>
                <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Audifonos" />
                </br>
                <label>Precio</label></br>
                <input type="text" class="form-control" name="txtPrecio"id="txtPrecio" placeholder="10.50" />
                </br>
                <button class="btn btn-success" type="submit" name="btnEnviar" id="btnEnviar">Enviar</button>
                <a class="btn btn-primary" href="index.php" role="button">Carrito</a>
                <div id="respuesta"></div>
            </div>
        </div>
    </div>
</body>
</html>