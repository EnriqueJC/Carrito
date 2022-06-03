<?php
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];   

    $serverName="localhost";
    $userName="root";
    $pwd="";
    $BD="tienda";
    $con =mysqli_connect($serverName,$userName,$pwd,$BD);
    $sql="insert into producto (nombre,precio) values 
                        ('".$nombre."',".$precio.");";
    if(mysqli_query($con, $sql)){
        echo "Producto Ingresado";
    }else{
        echo "Error al Ingresar";
    }
    mysqli_close($con);
?>