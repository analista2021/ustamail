<?php
class conectar
{
//metodo de conceccion a la base de datos
function conectar()
	{
	$HOST="oracle.usantotomas.red";
	$USER_NAME="sinu";
	$PASSWORD="Gf7pTeK8V3h";
	$SERVICE_NAME="sac";
		
		$host="".$HOST."";
		$sid="(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=".$HOST.")(PORT=1521)))
		(CONNECT_DATA=(SERVICE_NAME=".$SERVICE_NAME.")))";
		$this->conn= oci_connect($USER_NAME,$PASSWORD,$sid,'AL32UTF8');
	
		 if(!$this->conn)
		 {
		 echo "Conexion invalida" . var_dump(ocierror());
		 die();
		 }		
	}
//metodo que permite desconectar de la base de datos
public function desconectar()
{
	oci_close();
}
//metodo para retornar datos desde la base de datos recibe objetoconexion mas la consulta y el paramotro general
//1 para mysql_fetch_array, 2 para mysql_num_rows
//retorna un arrglo con los datos
public function traerdatos($strSQL)
{
	//echo $strSQL;
	$link=$this->conn;

		$traedatos=oci_parse($link,$strSQL);
		if(oci_execute($traedatos))
		{
			return $traedatos;	
		}
		else
		{
			return 0;
		}
}


function consultasp($consulta)
	{
		//esta funcion se utiliza para realizar consultas unicamente 
		$stid = oci_parse($this->conn, $consulta); //recibe la consulta como parametro y obtiene la variable de la funcion constructura
		oci_execute($stid); //ejecta

			oci_fetch_all($stid,$fila,null,null,OCI_FETCHSTATEMENT_BY_ROW+OCI_NUM); //regresa todos los datos de la consulta como un vector bidimensional por cada fila
			oci_free_statement($stid); //libera la consulta y los recursos para no consumirse otra vez
			return $fila;	
	}

public function numfilas($sql)
{

$link=$this->conn;
$sql_query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM ('.$sql.')';
$stmt= oci_parse($link, $sql_query);
oci_define_by_name($stmt, 'NUMBER_OF_ROWS', $number_of_rows);
oci_execute($stmt);
oci_fetch($stmt);
return $number_of_rows;
}





}

//Clase para la creacion de sesiones, manejo de las mismas, terminacion, agregar datos a la sesion y demas

class crearSesion
{
//metodo que retorna un 1 si la session se creo y un cero si la misma no se crea

public function crearSesion()
{
	session_start();
	if (!session_id())
	{
	return 0;
	}
	return session_id();
}
//metodo que retorna 1 si se termino la session correctamente y 1 si la secion no se ha podido terminar
public function terminarSesion()
{
	session_destroy();
	if (!session_id())
	{
	return 1;
	}
	return 0;
}
//resibe un arreglo con la(s) variable(s) que se quieren agregar a las ya existentes retorna 1 si las puede añadir y 0 siu no lo logra
public function agregarVariables($nombre,$variables)
{
	//$this->crearSesion();
	$_SESSION[$nombre] = $variables;
	session_register($nombre);
	return 1;
}
}

extract($_POST);
extract($_GET);
?>
