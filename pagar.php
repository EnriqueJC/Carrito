<?php
session_start();
$verificar=true;
$subtotal=sprintf('%.2f', $_POST['subtotal']);
$iva=sprintf('%.2f', $_POST['iva']);
$total=sprintf('%.2f', $_POST['total']);
echo ("El subtotal de su compra es ".$subtotal." con ".$iva." de IVA y es un total de ".$total);
if($verificar){
    session_destroy();
    echo "</br><a href='index.php' role='button'>Finalizar</a>";
}
?>
