<?php
require_once('funciones.php');
Conectar();
$link = mysqli_connect("localhost", "root", "", "paises");

$rec= $_POST['arreglo'];
$imagEl = $_POST['imgE'];

 $array= explode (" ",$rec);
 $num=count($array)-1;

 $arrayI= explode (" ",$imagEl);
 $numI=count($arrayI)-1;

$pat = "Imagenes/";

 for ($i=0; $i <$num ; $i++) {
   $fi=$array[$i];
   $fa=$arrayI[$i];
   mysqli_query($link, "DELETE FROM pais WHERE COD_PAIS ='".$fi."'");
   unlink($pat.$fa);
   //echo ($pat.$fa);
   //exit();

 }


 header ('location:listado.php');
 ?>
