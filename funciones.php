<?php
error_reporting(E_ALL);//Se activa el reporte completo de errores
$PathImg = "http://localhost/web/StevenIllanes_SebastianParedes_EddieVerdesoto/Imagenes/";
$MaxReg = 10;// Numero de registros por páginas
$MaxRegC = 4; //Numero de registros por paginas-ciudades
$conn;//Variable para almacenar la conexi+on con el servido MySql


//Conecta con la base usando PDO

function Conectar()
{
    global $conn; //Indica que se usará la conexión como la de nivel superior
    $usuario="root";
    $clave="";
    $conn= new PDO ('mysql:host=localhost;dbname=paises',$usuario,$clave);
    $conn->exec("set names utf8");
}
//Desconectar
function Desconectar()
{
    global $conn;
    $conn = null;
}
function opContinente($opcion)
{
    $texto ="<select name=\""."$opcion"."\"> ";
    $texto .=" <option value=ÁFRICA selected>ÁFRICA  </option>";
    $texto .=" <option value=AMÉRICA>AMÉRICA</option> ";
    $texto .=" <option value=ASIA>ASIA  </option> ";
    $texto .=" <option value=EUROPA>EUROPA </option> ";
    $texto .=" <option value=OCEANÍA>OCEANÍA </option> ";
    $texto .="</select>";
    return $texto;
}
function opContinenteEditar($continente)
{
    $texto ="<select name=\""."continente"."\"> ";
    if($continente==='ÁFRICA'){
    $texto .=" <option value=ÁFRICA selected>ÁFRICA  </option>";
    $texto .=" <option value=AMÉRICA>AMÉRICA</option> ";
    $texto .=" <option value=ASIA>ASIA  </option> ";
    $texto .=" <option value=EUROPA>EUROPA </option> ";
    $texto .=" <option value=OCEANÍA>OCEANÍA </option> ";
    }
    else if($continente==='AMÉRICA')
    {
        $texto .=" <option value=ÁFRICA>ÁFRICA  </option>";
        $texto .=" <option value=AMÉRICA selected >AMÉRICA </option>";
        $texto .=" <option value=ASIA>ASIA  </option> ";
        $texto .=" <option value=EUROPA>EUROPA </option> ";
        $texto .=" <option value=OCEANÍA>OCEANÍA </option> ";
    }
    else if($continente==='ASIA')
    {
        $texto .=" <option value=ÁFRICA>ÁFRICA  </option>";
        $texto .=" <option value=AMÉRICA>AMÉRICA </option>";
        $texto .=" <option value=ASIA selected>ASIA  </option> ";
        $texto .=" <option value=EUROPA>EUROPA </option> ";
        $texto .=" <option value=OCEANÍA>OCEANÍA </option> ";
    }
    else if($continente==='EUROPA')
    {
        $texto .=" <option value=ÁFRICA>ÁFRICA  </option>";
        $texto .=" <option value=AMÉRICA>AMÉRICA </option>";
        $texto .=" <option value=ASIA>ASIA  </option> ";
        $texto .=" <option value=EUROPA selected >EUROPA </option> ";
        $texto .=" <option value=OCEANÍA>OCEANÍA </option> ";
    }
    else if($continente==='OCEANÍA')
    {
        $texto .=" <option value=ÁFRICA>ÁFRICA  </option>";
        $texto .=" <option value=AMÉRICA selected >AMÉRICA </option>";
        $texto .=" <option value=ASIA>ASIA  </option> ";
        $texto .=" <option value=EUROPA>EUROPA </option> ";
        $texto .=" <option value=OCEANÍA selected>OCEANÍA </option> ";
    }
    $texto .="</select>";
    return $texto;
}
?>
