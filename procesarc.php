<?php 
include("funciones.php");
$accion = $_POST["txtAccion"];
$codp = $_POST['codp'];
switch($accion)
{
    case "editar":
        $id = $_POST["id"];
        EditarRegistro($id);
    case 'agregar':
            AgregarRegistro();
}
header("location:listado.php");

function EditarRegistro($id)
{
    //echo("Se va a editar el registro: ".$id);
    //exit();
    $id = $_POST["txtCodigo"];
    //echo($id);
    //exit();
    $pais = $_POST["txtPais"];
    //echo($pais);
    //exit();
    $nombre = $_POST["txtNombre"];
    $habitantes = $_POST["txtHabitantes"];
    $imagen = $_POST['txtImagen'];
    $img=str_replace(' ','',$imagen);
    try
    {       
        global $conn;      
        Conectar();    
        $sql = "UPDATE ciudad SET NOM_CIUDAD=:nombre, ";
        $sql .="IMG_CIUDAD=:imagen, NHAB_CIUDAD=:habitantes ";
        $sql .="WHERE COD_CIUDAD=:id";
        $cursor = $conn->Prepare($sql);
        $cursor->bindParam(':nombre',$nombre);
        $cursor->bindParam(':habitantes',$habitantes);
        $cursor->bindParam(':imagen',$img);
        $cursor->bindParam(':id',$id);
        $cursor->execute();
        //echo($sql);exit();   
        $cursor->execute();
    }
    catch(PDOException $e)
    {
        echo("Error: ".$e->getMessage()."<br/>");
    }
        $cursor = null;
        $conn= null;
    
}

function EliminarRegistro($id)
{
    /*
    DELETE p1,p2    -- remove only rows from pets
FROM pais p1
JOIN ciudad p2
ON p2.COD_PAIS = p1.COD_PAIS
WHERE p1.COD_PAIS = 'AR';
    */
    try{
        global $conn;
        Conectar();
        $sql = "DELETE FROM persona WHERE id=:id";
        $cursor = $conn->Prepare($sql);
        $cursor->bindParam(":id",$id);
        $cursor->execute();
    }
    catch(PDOException $e)
    {
        echo("Error: ".$e->getMessage()."<br/>");
    }
    $conn = null;
    $cursor = null;
    
}

function AgregarRegistro() {
    $id = $_POST["txtCodigo"];
    $nombre = $_POST["txtNombre"];
    $habitantes = $_POST["txtHabitantes"];
    $imagen = $_FILES['txtImagen']['name'];
      try {
        global $conn;
        Conectar();
        $sql = "INSERT INTO ciudad (COD_PAIS,NOM_CIUDAD,IMG_CIUDAD,NHAB_CIUDAD)
        VALUES (:id,:nombre,:imagen,:habitantes)";
        
        $cursor = $conn->Prepare($sql);
        $cursor->bindParam(':nombre',$nombre);
        $cursor->bindParam(':habitantes',$habitantes);
        $cursor->bindParam(':imagen',$imagen);
        $cursor->bindParam(':id',$id);
        $cursor->execute();
        $path = "Imagenes/";
        $img_archivo = $path . basename($_FILES["txtImagen"]["name"]);
        move_uploaded_file($_FILES["txtImagen"]["tmp_name"], $img_archivo);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage(). '<br>';
    }
    $cursor = null;
    $conn = null;

}
?>
