<?php
//Pontificia Universidad Católica del Ecuador
//Steven Illanes
//Sebastian Paredes
//Eddie Verdesoto
require_once('funciones.php');//Se incrusta el archivo de funciones

//Para la paginación
$pagina=0;//Número de página en la que estoy, 0 es el default.
if(!$_GET)
{
    header('location:listado.php?pagina=1');
}
if(isset($_GET['pagina']))
    if($_GET['pagina']>0)
        $pagina= $_GET['pagina'];

$inicio = ($pagina-1) * $MaxReg; //Número del 1er registro a presentar
Conectar();

//Se calcula el total de páginas que habrá de acuerdo al número de registros
//que existe en la tabla.

$sqlCompleto ="SELECT COD_PAIS,NOM_PAIS,CON_PAIS,CAP_PAIS,IMG_PAIS FROM pais ORDER BY COD_PAIS";
$cursor= $conn->prepare($sqlCompleto);
$cursor->execute();
//$resultado= $cursor->fetchAll();
//$totalRegistros = count($resultado);
$totalRegistros = $cursor->rowCount();
$cursor= null;
$totalPaginas= ceil($totalRegistros/$MaxReg);
//echo $totalRegistros. "<br/>";
//echo $totalPaginas. "<br/>";
//exit();
if($pagina>$totalPaginas || $_GET['pagina']<=0){
    header('location:listado.php?pagina=1');
}

//Se hace la consulta de solo los registros que se van a presentar
$sql ="SELECT COD_PAIS,NOM_PAIS,CON_PAIS,CAP_PAIS,IMG_PAIS
FROM pais ORDER BY COD_PAIS LIMIT ";
$sql .=$inicio.",".$MaxReg;
//echo $sql."<br/>";
//exit();
?>

<html>
<head>
      <meta charset="utf-8"/>
        <title>Países</title>

        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <div align='center'>
    <td><h1><b>Los datos de la tabla País son:</b> </h1></td>
    <td> <h2><a href="agregar.php">Agregar nuevo registro</a></h2> <br></tr>
   </td>
        </font></tr>
        </div>
          <form action="eliminacion.php" method="POST">
            <table class="container">
            <thead>

            <tr>
                <td><b>Código   </b><br><br></td>
                <td><b>Nombre del país</b><br><br></td>
                <td><b>Continente</b><br><br></td>
                <td><b>Capital</b><br><br></td>
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

                    <td>
                       
                        <a href="ciudades.php?pagina=1&id=<?php echo($fila["COD_PAIS"]);?>" ><?php echo($fila["COD_PAIS"]);?></a>
                    </td>

                    <td><?php echo($fila["NOM_PAIS"]);?></td>
                    <td><?php echo($fila["CON_PAIS"]);?></td>
                    <td><?php echo($fila["CAP_PAIS"]);?></td>
                    <td>
                            <div align="center"><?php
                                if(isset($fila["IMG_PAIS"]))
                                {
                                    $cad = "<img src=\"".$PathImg."/".$fila["IMG_PAIS"]."\">";
                                    echo($cad);
                                }
                                else
                                    echo("&nbsp;");
                            ?></div>
                    </td>
                    <td> <a href="editar.php?id= <?php echo ($fila["COD_PAIS"]);?>">Editar </a> </td>

                    <td>
                        <input type="checkbox" name="SeleccionE[]" value="<?php  echo ($fila['COD_PAIS']);?>">
                    </td>
                  </tr>
            <?php
                  }
                }
                catch(PDOException $e)
                {
                    echo("Error!; ".$e->getMessage()."<br/>");
                }
                $cursor =  null;
                $conn = null;?>
                  <tr>
                    <td colspan="8" align="center">
                      <input type="submit" name="BtnEliminarS" value="Eliminar registros seleccionados">
                    </td>
                  </tr>
                </form>

        </table>

        <table class="container">
            <td colspan="4" align="center">
            <?php

                  if ($totalPaginas > 1) {

                    if ($pagina != 1) {
                      echo '<a href="listado.php?pagina='.($totalPaginas-($totalPaginas-1)).'">|<</a>';
                      echo '<a href="listado.php?pagina='.($pagina-1).'"> <span aria-hidden="true"> &laquo; </span></a>';
                    }

                    for ($i=0;$i<$totalPaginas;$i++) {
                      echo '<a href="listado.php?pagina='.($i+1).'">'." ".($i+1)." ".'</a>';
                    }

                    if ($pagina != $totalPaginas) {
                      echo '<a href="listado.php?pagina='.($pagina+1).'"><span aria-hidden="true"> &raquo; </span> </a>';
                      echo '<a href="listado.php?pagina='.($totalPaginas).'">>|</a>';
                    }
                }
                ?>
        </table>

    </body>
</html>
