<?php
//clase para la conexion blindando los parametros para eviatar sql inyeccion
class conectar
{
        function conectar()
        {
                $HOST="172.16.10.4";
                $USER_NAME="sinu";
                $PASSWORD="Gf7pTeK8V3h";
                $SERVICE_NAME="sac";
				
				/*$HOST="172.25.11.2";
                $USER_NAME="sinu";
                $PASSWORD="s1u2n3u4";
                $SERVICE_NAME="sacdesa";*/

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

        function consultasp($consulta,$tip_con)
        {
                //esta funcion se utiliza para realizar consultas unicamente
                $stid = oci_parse($this->conn, $consulta); //recibe la consulta como parametro y obtiene la variable de la funcion constructura
                oci_execute($stid); //ejecta
                if($tip_con == 1)  //parametro que me dice el tipo de transaccion que se va a realizar 1 para consulta, demas para updata, delete e insert
                {
                        oci_fetch_all($stid,$fila,null,null,OCI_FETCHSTATEMENT_BY_ROW+OCI_NUM); //regresa todos los datos de la consulta como un vector bidimensional por cada fila
                        oci_free_statement($stid); //libera la consulta y los recursos para no consumirse otra vez
                        return $fila;
                }
        }

        function countRows($consulta)
        {
                $stid = oci_parse($this->conn, $consulta); //recibe la consulta como parametro y obtiene la variable de la funcion constructura
                oci_execute($stid);
                oci_fetch_all($stid,$fila,null,null,OCI_FETCHSTATEMENT_BY_ROW+OCI_NUM); //regresa todos los datos de la consulta como un vector bidimensional por cada fila
                oci_free_statement($stid); //libera la consulta y los recursos para no consumirse otra vez
                return $fila[0][0]; //regresa la cantidad de registros encontrados
        }

        function cerrar()
        {
                oci_close($this->conn); //cierra la conexion
        }
}

class changeIdentity
{
        function changeIdentity($objConnect)
        {
                //Consulto los cambios de documento que han transcurrido en la ultima hora
                $queryIdentity = $objConnect->consultasp("SELECT A.NUM_IDENTIFICACION AS NEWIDENTITY, A.NUM_IDENT_ANTIGUA AS
				 OLDIDENTITY, FECHA FROM  jsanabria.md_actualizar_identificacion A WHERE A.num_identificacion != A.num_ident_antigua
				 AND A.fecha > (SYSDATE - 1 /24)",1); //to_date('01/08/2015','dd/mm/yyyy')",1);
                $cont = 0;
                foreach($queryIdentity as $keyChange => $dataChange)
                {
                          //Verifico que exista en ECAUST
                        $queryUpdate = $objConnect->countRows("SELECT COUNT(*) FROM jrgutierrez.mail_t_users T WHERE T.DOCUMENTO = '".$dataChange[1]."'");
                        if($queryUpdate > 0)
                        {
                                echo $date = ($cont==0) ? "Date : ".date('Y-m-d')."\n" : "";
                                //Realizo la actualizaciÃ³n
                                $objConnect->consultasp("UPDATE jrgutierrez.mail_t_users T SET T.documento = '".$dataChange[0]."'
								WHERE T.documento = '".$dataChange[1]."'",2);
                                //log
                                echo "newIdentity Mail_t_users: ".$dataChange[0]." -> oldIdentity : ".$dataChange[1],"\r\n";
                                $cont++;
                        }
                }
        }
}

//Ejecutar actualizaciÃ³n
$objRunUpdate = new changeIdentity($objConnect = new conectar());
?>
