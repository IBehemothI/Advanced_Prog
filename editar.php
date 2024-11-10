<?php  
//Presenta los valores de un registro de la tabla persona para una edición
include("funciones.php");
$nombre=""; $continente; $capital; $imagen;
if(isset($_GET["id"]))
{
    $COD_PAIS = $_GET["id"];
}
if(isset($_GET['pagina']))
    $pagina= $_GET['pagina'];

$id=str_replace(' ','',$COD_PAIS);
$sql="SELECT COD_PAIS,NOM_PAIS,CON_PAIS,CAP_PAIS,IMG_PAIS FROM pais WHERE COD_PAIS='$id'";
try
{
Conectar();
$resultado = $conn->query($sql);
    foreach($resultado as $fila)
    {
        $nombre = $fila["NOM_PAIS"];
        $continente= $fila["CON_PAIS"];
        $capital =$fila["CAP_PAIS"];
        $imagen=$fila["IMG_PAIS"];
    }
}
catch (PDOException $e)
{
    echo("Error: ".$e->getMessage()."<br/>");
}
?>
<html>
    <body>
        <font color="darkblue" size="5"><b>Editar Registro</b></font>
        <br> <br>
        <form action="procesar.php" method="post">
            <table border="1" bgColor="Yellow">
                <tr>
                    <td><b><font color="blue">Nombre</font></b></td>  
                    <td>
                    <input type="text" name="txtNombre" value="<?php echo ($nombre);?>">
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Continente</font></b></td>  
                    <td>
                    <?php echo opContinenteEditar($continente); ?>
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Capital</font></b></td>  
                    <td>
                    <input type="text" name="txtCapital" value="<?php echo ($capital);?>">
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Imagen</font></b></td>  
                    <td> <div align="center"><?php if(isset($imagen))
                     echo ("<img src=\"".$PathImg."/".$imagen."\">" );?> <br>
                    <input type="txt" name="txtImagen" value="
                    <?php 
                    if(isset($imagen)) 
                        echo ($imagen);                  
                    ?>"></div>
                    
                    </td>      
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" name="btnEditar" value="Editar"
                        onclick="javascript:location.href='listado.php?pagina=<?php echo ($pagina);?>';">
                    </td>  
                    <td align="center">  
                        <input type="button" name="btnCancelar" value="Cancelar"
                        onclick="javascript:location.href='listado.php?pagina=<?php echo ($pagina);?>';">
                        <input type="hidden" name="txtAccion" value="editar">
                        <input type="hidden" name="id" value="<?php echo($id);?>">
                    </td>  
                </tr>
            </table>
        </form>
    </body>
</html>