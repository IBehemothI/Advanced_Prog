<?php  
//Presenta los valores de un registro de la tabla persona para una edición
include("funciones.php");
$nombre; $sueldo; $fecha; $masculino; $imagen;
$año; $mes; $dia;
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
}
$sql = "SELECT * FROM persona WHERE id = ".$id;
//echo("Se va a editar el registro ".$id."<br/>".$sql); exit();
try
{
Conectar();
    $resultado = $conn->query($sql);
    foreach($resultado as $fila)
    {
        $nombre = $fila["Nombre"];
        $sueldo= $fila["Sueldo"];
        $fecha=$fila["Fecha"];
        $masculino=$fila["Masculino"];
        $imagen=$fila["Imagen"];
    }
    $resultado = null;
    $conn = null;

}
catch (PDOException $e)
{
    echo("Error: ".$e->getMessage()."<br/>");
}

?> 
<html>
    <body>
        <font color="darkblue" size="5"><b>Eliminar Registro</b></font>
        <br> <br>
        Está usted seguro que desea eliminar este registro? <br>
        <form action="procesar.php" method="post">
            <table border="1" bgColor="Yellow">
                <tr>
                    <td><b><font color="blue">Id</font></b></td>  
                    <td>
                    <?php echo ($id);?>
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Nombre</font></b></td>  
                    <td>
                    <?php echo ($nombre);?>
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Sueldo</font></b></td>  
                    <td>
                    <?php echo ($sueldo);?>
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Fecha</font></b></td>  
                    <td>
                    <?php echo ($fecha);?>
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Femenino</font></b></td>  
                    <td>
                    <?php if($masculino) 
                            echo ("Si");
                            else
                            echo("No");?>
                    </td>      
                </tr>
                <tr>
                    <td><b><font color="blue">Imagen</font></b></td>  
                    <td>
                    <?php echo ($imagen);?> <br>
                    <img src="<?php echo ($PathImg."/".$imagen);?>">
                    </td>      
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" name="btnEditar" value="Si">
                    </td>  
                    <td align="center">  
                        <input type="button" name="btnCancelar" value="No"
                        onclick="javascript:location.href='listado.php';"
                        >
                        <input type="hidden" name="txtAccion" value="eliminar">
                        <input type="hidden" name="id" value="<?php echo($id);?>">
                    </td>   
                </tr>
            </table>
        </form>
    </body>
</html>