<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="eliminacionfinal.php" method="POST">
    <h1>Eliminar registros</h1>

    <table class="container">
    <thead>

    <tr>
        <td><b>Código   </b><br><br></td>
        <td><b>Nombre del país</b><br><br></td>
        <td><b>Continente</b><br><br></td>
        <td><b>Capital</b><br><br></td>
        <td><b>Imagen</b><br><br></td>

    </tr>
    </thead>
<?php
require_once('funciones.php');
Conectar();
$rec="";
$imagEl="";

if (@$_POST['BtnEliminarS']) {
  
  foreach ($_POST['SeleccionE'] as $COD_PAIS) {


    $rec.= $COD_PAIS." ";
    
    //mysql_query('DELETE FROM pais WHERE COD_PAIS = '. $COD_PAIS);;

    $sql ="SELECT COD_PAIS,NOM_PAIS,CON_PAIS,CAP_PAIS,IMG_PAIS FROM pais WHERE COD_PAIS ='$COD_PAIS'";
    $resultado = $conn->query($sql);
        foreach($resultado as $fila)
        {
            $nombre = $fila["NOM_PAIS"];
            $continente= $fila["CON_PAIS"];
            $capital =$fila["CAP_PAIS"];
            $imagen=$fila["IMG_PAIS"];
        }
        $imagEl.=$imagen." ";
    ?>
    <tr>
    <td><?php echo($COD_PAIS );?> </td>
    <td><?php echo($nombre );?> </td>
    <td><?php echo($continente );?> </td>
    <td><?php echo($capital );?> </td>
    <td><?php echo($imagen);?> </td>
    </tr>

    <?php
}
//echo($rec);
//exit();
?>
<tr>
  <td colspan="8">
    <input type="submit" name="BtnEliminacionD" value="Confirmar eliminacion">
    <input type="hidden" name="arreglo" value="<?php echo ($rec); ?> ">
    <input type="hidden" name="imgE" value="<?php echo ($imagEl); ?> ">
  </td>
</tr>

<?php
}

 ?>
    </table>
  </form>
   </body>
 </html>
