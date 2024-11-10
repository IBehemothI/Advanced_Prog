<?php
require_once('funciones.php');//Se incrusta el archivo de funciones

if(isset($_GET['id']))
    $codp=$_GET['id'];
else
    $codp= $_POST['id'];
//echo($codp);
//exit();
//Para la paginación
//$id=$_GET['id'];
//echo($id);
//exit();
$pagina=0;//Número de página en la que estoy, 0 es el default.
if(!$_GET)
{
    header('location:ciudades.php?pagina=1&id='.$codp);
}
if(isset($_GET['pagina']))
    if($_GET['pagina']>0)
        $pagina= $_GET['pagina'];

if(isset($_GET['ordenar']))
    $ordenar= $_GET['ordenar'];

$inicio = ($pagina-1) * $MaxRegC; //Número del 1er registro a presentar
Conectar();

//Se calcula el total de páginas que habrá de acuerdo al número de registros
//que existe en la tabla.

$sqlCompleto ="SELECT COD_CIUDAD,COD_PAIS,NOM_CIUDAD,IMG_CIUDAD,NHAB_CIUDAD FROM ciudad WHERE COD_PAIS ='".$codp."' ORDER BY COD_PAIS";
//echo($sqlCompleto);
//exit();
$cursor= $conn->prepare($sqlCompleto);
$cursor->execute();
//$resultado= $cursor->fetchAll();
//$totalRegistros = count($resultado);
$totalRegistros = $cursor->rowCount();
$cursor= null;
$totalPaginas= ceil($totalRegistros/$MaxRegC);
//echo $totalRegistros. "<br/>";
//echo $totalPaginas. "<br/>";
//exit();

//echo($inicio);
//exit();
//Se hace la consulta de solo los registros que se van a presentar
$sql ="SELECT COD_CIUDAD,NOM_CIUDAD,IMG_CIUDAD,NHAB_CIUDAD FROM ciudad WHERE COD_PAIS ='".$codp."' ORDER BY COD_PAIS LIMIT ";
$sql .=$inicio.",".$MaxRegC;
//echo $sql."<br/>";
//exit();
if(isset($_GET['ordenar'])&&isset($_GET['pagina'])){
    if($inicio<0){
        $inicio=0;
        $sql ="SELECT COD_CIUDAD,NOM_CIUDAD,IMG_CIUDAD,NHAB_CIUDAD FROM ciudad WHERE COD_PAIS ='".$codp."' ORDER BY ".$ordenar." LIMIT ";
        $sql .=$inicio.",".$MaxReg; 
    }
    else{
        $sql ="SELECT COD_CIUDAD,NOM_CIUDAD,IMG_CIUDAD,NHAB_CIUDAD FROM ciudad WHERE COD_PAIS ='".$codp."' ORDER BY ".$ordenar." LIMIT ";
        $sql .=$inicio.",".$MaxReg; 
    }
}
else{
        $sql ="SELECT COD_CIUDAD,NOM_CIUDAD,IMG_CIUDAD,NHAB_CIUDAD FROM ciudad WHERE COD_PAIS ='".$codp."' ORDER BY COD_PAIS LIMIT ";
        $sql .=$inicio.",".$MaxReg; 
    }
?>

<html>
<head>
      <meta charset="utf-8"/>
        <title>Ciudades</title>

        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div align='center'>
    <form action="agregarciudad.php?id=<?php echo($codp);?>" method="post">
                        <input type="submit" value="Agregar nuevo registro">
                        <input type="hidden" name="codp" value="<?php echo($codp)?>">
                        </form>

    <form action="eliminacion2.php" method="POST">
    <br></tr>
   </td>
        </font></tr>
        </div>
            <table class="container">
            <thead>

            <tr>
                <td><b><?php echo '<a href=ciudades.php?pagina='.$pagina.'1&ordenar=COD_CIUDAD&id='.$codp.'>Código </a>';?></b><br><br></td>
                <td><b><?php echo '<a href=ciudades.php?pagina='.$pagina.'&ordenar=NOM_CIUDAD&id='.$codp.'>Nombre de la ciudad </a>';?></b><br><br></td>
                <td><b><?php echo '<a href=ciudades.php?pagina='.$pagina.'&ordenar=NHAB_CIUDAD&id='.$codp.'>Número de Habitantes </a>';?></b><br><br></td>
                <td><b>Imagen</b><br><br></td>
                <td><b>Editar Registro</b><br><br>
                <td><b>Eliminar Registro</b><br><br>
            </tr>
            </thead>

            <?php
                try
                {

                    $cursor = $conn->query($sql);
                    foreach($cursor as $fila)
                    {
            ?>
                    <tr>
                        <td><?php echo($fila["COD_CIUDAD"]);?></td>
                        <td><?php echo($fila["NOM_CIUDAD"]);?></td>
                        <td><?php echo($fila["NHAB_CIUDAD"]);?></td>
                        <td>
                            <div align="center"><?php
                                if(isset($fila["IMG_CIUDAD"]))
                                {
                                    $cad = "<img src=\"".$PathImg."/".$fila["IMG_CIUDAD"]."\">";
                                    echo($cad);
                                }
                                else
                                    echo("&nbsp;");
                            ?></div>
                            </td>
                        <td>

                        <a href="editarciudad.php?id= <?php echo ($fila["COD_CIUDAD"]);?>&pagina=<?php echo($pagina); ?>&pais=<?php echo($codp); ?>">Editar </a>

                        </td>
                        <td> <input type="checkbox" name="SeleccionE[]" value="<?php  echo ($fila['COD_CIUDAD']);?>"> </td>
                    </tr>
            <?php
                    }
            ?>
                    <tr>
                      <td colspan="8" align="center">
                        <input type="submit" name="BtnEliminarS" value="Eliminar registros seleccionados">
                      </td>
                    </tr>
                  </form>
            <?php
                }
                catch(PDOException $e)
                {
                    echo("Error!; ".$e->getMessage()."<br/>");
                }
                $cursor =  null;
                $conn = null;
            ?>
        </table>
        <table >
        <td> <a href="listado.php"><font color=red>Regresar al listado </font></a></td>
            <div align="center" style="border:1px solid red">

            <td><?php

                    if ($totalPaginas > 1) {
                        if ($pagina != 1) {
                        echo ("<td><form action=ciudades.php?pagina=".($totalPaginas-($totalPaginas-1))."&id=".$codp." method=post> <input type=submit value=".('|&laquo;')." >  <input type=hidden name=id value=".$codp."></form></td>");
                        echo ("<td><form action=ciudades.php?pagina=".($pagina-1)."&id=".$codp." method=post> <input type=submit value=&laquo; >  <input type=hidden name=id value=".$codp."></form></td>");
                        } ?></td>
                        <?php 
                        for ($i=0;$i<$totalPaginas;$i++) {
                        echo ("<td><form action=ciudades.php?pagina=".($i+1)."&id=".$codp." method=post> <input type=submit value=".($i+1)."> <input type=hidden name=id value=".$codp."></form> </td>");
                        } ?><td>
                        <?php 
                        if ($pagina != $totalPaginas) {
                        echo ("<td><form action=ciudades.php?pagina=".($pagina+1)."&id=".$codp." method=post> <input type=submit value=&raquo >  <input type=hidden name=id value=".$codp."></form></td>");
                        echo ("<td><form action=ciudades.php?pagina=".($totalPaginas)."&id=".$codp." method=post> <input type=submit value=".("&raquo;|")." >  <input type=hidden name=id value=".$codp."></form></td>"); 
                        }
                    }
                  ?> </td>
            </div>
        </table>
    </body>
</html>
