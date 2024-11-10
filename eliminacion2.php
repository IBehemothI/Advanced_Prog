<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="eliminacionfinal2.php" method="POST">
    <h1>Eliminar registros</h1>

    <table class="container">
    <thead>

    <tr>
        <td><b>Código   </b><br><br></td>
        <td><b>Nombre de ciudad</b><br><br></td>
        <td><b>Número de habitantes</b><br><br></td>
        <td><b>Imagen</b><br><br></td>

    </tr>
    </thead>
<?php
require_once('funciones.php');
Conectar();
$rec="";
$imagEl="";

if (@$_POST['BtnEliminarS']) {
  foreach ($_POST['SeleccionE'] as $COD_CIUDAD) {

    $rec.= $COD_CIUDAD." ";
    //mysql_query('DELETE FROM pais WHERE COD_PAIS = '. $COD_PAIS);;

    $sql ="SELECT COD_CIUDAD,COD_PAIS,NOM_CIUDAD,NHAB_CIUDAD,IMG_CIUDAD FROM ciudad WHERE COD_CIUDAD ='$COD_CIUDAD'";
    $resultado = $conn->query($sql);
        foreach($resultado as $fila)
        {
            $nombre = $fila["NOM_CIUDAD"];
            $habitantes= $fila["NHAB_CIUDAD"];
            $foto =$fila["IMG_CIUDAD"];
        }
        $imagEl.=$foto." ";
    ?>
    <tr>
    <td><?php echo($COD_CIUDAD );?> </td>
    <td><?php echo($nombre );?> </td>
    <td><?php echo($habitantes );?> </td>
    <td><?php echo($foto );?> </td>
    </tr>

    <?php
}
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
