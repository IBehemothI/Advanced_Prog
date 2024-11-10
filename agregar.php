<?php
require_once 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Agregar pais</title>
    </head>
    <body>
        <font color="navy" size="5"><b>Agregar Registro</b></font><br><br>
        <form action="procesar.php" method="post" enctype="multipart/form-data">
        <table border="1" bgcolor="yellow">
            <tr>
                <td>
                    <b><font color="navy">Código:</font></b>
                </td>
                <td>
                    <input type="text" name="txtCodigo" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <b><font color="navy">Nombre:</font></b>
                </td>
                <td>
                    <input type="text" name="txtNombre" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <b><font color="navy">Continente:</font></b>
                </td>
                <td>
                    <?php echo opContinente("continente"); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <b><font color="navy">Capital:</font></b>
                </td>
                <td>
                    <input type="text" name="txtCapital" value="">
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
                    <input type="button" name="btnCancelar" value="Cancelar" 
                    onClick= "javascript:location.href = 'listado.php';">
                    <input type="hidden" name="txtAccion" value="agregar">
                </td>
            </tr>
        </table>
        </form>
    </body>
    </html>