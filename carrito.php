<?php
include("conexion.php");
session_start();
$verificar=true;
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["Agregar"])){
    $id=$_POST['id'];
    $sql="Select * from producto where id=$id;";
    $result=mysqli_query($con, $sql);
    $row=$result->fetch_assoc();
    if(!isset($_SESSION["CARRITO"])){
    $temCarrito= array(
        "id"=>$row["id"],
        "nombre"=>$row["nombre"],
        "precio"=>$row["precio"],
        "cantidad"=>1,
        "importe"=>$row["precio"]
    );
    $_SESSION["CARRITO"][$row["id"]]=$temCarrito;
    }else{
        foreach ($_SESSION["CARRITO"] as $elemento){
            if($elemento["id"] == $id){
                $_SESSION["CARRITO"][$id]["cantidad"]++;
                $_SESSION["CARRITO"][$id]["importe"]=$_SESSION["CARRITO"][$id]["cantidad"]*$_SESSION["CARRITO"][$id]["precio"];
                $verificar=false;
            }
        }
        if($verificar){
        $totalElementos = count($_SESSION["CARRITO"]);
        $temCarrito= array(
            "id"=>$row["id"],
            "nombre"=>$row["nombre"],
            "precio"=>$row["precio"],
            "cantidad"=>1,
            "importe"=>$row["precio"]
        );
        $_SESSION["CARRITO"][$row["id"]]=$temCarrito;
        }
    }
    header("Location: carritovista.php");
}else if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["Eliminar"])){
    $id=$_POST['id'];
    unset($_SESSION["CARRITO"][$id]);
    header("Location: carritovista.php");
}
