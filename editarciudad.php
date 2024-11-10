<?php  
//Presenta los valores de un registro de la tabla persona para una edición
include("funciones.php");
//echo($codp);
//exit();
if(isset($_GET["id"]))
{
    $COD_CIUDAD = $_GET["id"];
}
if(isset($_GET['pagina']))
    $pagina= $_GET['pagina'];

if(isset($_GET['pais']))
    $pais= $_GET['pais'];
$id=str_replace(' ','',$COD_CIUDAD);
//echo($id);
//exit();
$sql="SELECT COD_CIUDAD,COD_PAIS,NOM_CIUDAD,IMG_CIUDAD,NHAB_CIUDAD FROM ciudad WHERE COD_CIUDAD='$id'";
//echo($sql);
//exit();
try
{
Conectar();
$resultado = $conn->query($sql);
    foreach($resultado as $fila)
    {
        $codciudad= $fila["COD_CIUDAD"];
        $nombre = $fila["NOM_CIUDAD"];
        $codpais = $fila["COD_PAIS"];
        $imagen=$fila["IMG_CIUDAD"];
        $habitantes = $fila["NHAB_CIUDAD"];
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
        <form action="procesarc.php" method="post">
            <table border="1" bgColor="Yellow">
                <tr>
                <td>
                    <b><font color="navy">Código de la ciudad:</font></b>
                </td> 
                <td>
                    <input type="text" name="txtCodigo" value="<?php echo($codciudad);?>" readonly="readonly">
                </td> </tr>
                <tr>
                <td>
                    <b><font color="navy">Código del país:</font></b>
                </td>
                <td>
                    <input type="text" name="txtPais" value="<?php echo($codpais);?>" readonly="readonly">
                </td>
                
                </tr>    
                <tr>
                    <td><b><font color="blue">Nombre de la Ciudad</font></b></td>  
                    <td>
                    <input type="text" name="txtNombre" value="<?php echo ($nombre);?>">
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Número de Habitantes</font></b></td>  
                    <td>
                    <input type="number" name="txtHabitantes" value="<?php echo ($habitantes);?>">
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
                        onclick="javascript:location.href='ciudades.php?pagina=<?php echo($pagina);?>&id=<?php echo($pais);?>';">
                    </td>  
                    <td align="center">  
                    <input type="button" name="btnCancelar" value="Cancelar"
                        onclick="javascript:location.href='ciudades.php?pagina=<?php echo($pagina);?>&id=<?php echo($pais);?>';">
                        <input type="hidden" name="txtAccion" value="editar">
                        <input type="hidden" name="id" value="<?php echo($id);?>"> 
                    </td>   
                </tr>
            </table>
        </form>
    </body>
</html>