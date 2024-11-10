<?php
require_once 'funciones.php';
$id= $_GET['id'];
//echo($id);
//exit();
$codp = $_POST['codp'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Agregar ciudad</title>
    </head>
    <body>
        <font color="navy" size="5"><b>Agregar Registro</b></font><br><br>
        <form action="procesarc.php" method="post" enctype="multipart/form-data">
        <table border="1" bgcolor="yellow">
            <tr>
                <td>
                    <b><font color="navy">Código del País:</font></b>
                </td>
                <td>
                    <input type="text" name="txtCodigo" value="<?php echo($id);?>" readonly="readonly">
                </td>
            </tr>
            <tr>
                <td>
                    <b><font color="navy">Nombre de la Ciudad:</font></b>
                </td>
                <td>
                    <input type="text" name="txtNombre" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <b><font color="navy">Número de Habitantes:</font></b>
                </td>
                <td>
                    <input type="number" name="txtHabitantes" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <b><font color="navy">Imagen:</font></b>
                </td>
                <td>
                    <input type="file" name="txtImagen" accept="image/x-png,image/gif,image/jpeg">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" name="btnAgregar" value="Agregar">
                </td>
                <td align="center">
                        <a href="listado.php"> Cancelar </a>  
                    <input type="hidden" name="txtAccion" value="agregar">
                    <input type="hidden" name="id" value="<?php echo($id);?>"> 
                   
                </td>
            </tr>
        </table>
        </form>
    </body>
    </html>