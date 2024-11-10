<?php 
include("funciones.php");
$accion = $_POST["txtAccion"];

switch($accion)
{
    case "editar":
        $id = $_POST["id"];
        EditarRegistro($id);
    case "eliminar":
        $id = $_POST["id"];
        EliminarRegistro($id);
    case 'agregar':
            AgregarRegistro();
}
header("location:listado.php");

function EditarRegistro($id)
{
    //echo("Se va a editar el registro: ".$id);
    //exit();
    $nombre = $_POST["txtNombre"];
    $continente = $_POST["continente"];
    $capital = $_POST["txtCapital"];
    $imagen = $_POST["txtImagen"];
    $img=str_replace(' ','',$imagen);
    try
    {       
        global $conn;      
        Conectar();    
        $sql = "UPDATE pais SET NOM_PAIS=:nombre, CON_PAIS=:continente, ";
        $sql .="CAP_PAIS=:capital, IMG_PAIS=:imagen ";
        $sql .="WHERE COD_PAIS=:id";
        /*$sql="UPDATE pais SET ";
        $sql.="NOM_PAIS= '".$nombre."',";
        $sql.="CON_PAIS= '".$continente."',";
        $sql.="CAP_PAIS= '".$capital."',";
        $sql.="IMG_PAIS= '".$imagen."' ";
        $sql.=" WHERE COD_PAIS='$id'";*/
        $cursor = $conn->Prepare($sql);
        $cursor->bindParam(':nombre',$nombre);
        $cursor->bindParam(':continente',$continente);
        $cursor->bindParam(':capital',$capital);
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
    $continente = $_POST["continente"];
    $capital = $_POST["txtCapital"];
    $imagen = $_FILES['txtImagen']['name'];
      try {
        global $conn;
        Conectar();
        $sql = "INSERT INTO pais (COD_PAIS,NOM_PAIS,CON_PAIS,CAP_PAIS,IMG_PAIS)
        VALUES (:id,:nombre, :continente, :capital,:imagen)";
        
        $cursor = $conn->Prepare($sql);
        $cursor->bindParam(':nombre',$nombre);
        $cursor->bindParam(':continente',$continente);
        $cursor->bindParam(':capital',$capital);
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
