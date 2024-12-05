<?php include ('clases.php');
$instance = new conectar;
?><!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <!--<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" type="text/css" />
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
	/*
 * Specific styles of signin component
 */
/*
 * General styles
 */
body, html {
    height: 100%;
    background-repeat: no-repeat;
	/*background-color:#F7F7F7;*/
}
/*
 * Card component
 */
.card {
    background-color: #fff;
    /* just in case there no content*/
    padding: 20px 25px 30px;
   /* margin: 0 auto 25px;*/
   /* margin-top: 50px;*/
    /* shadows and rounded borders */
	/*border-top:20px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */


.box {
  background:#fff;
  transition:all 0.2s ease;
  border:2px dashed #dadada;
  margin-top: 10px;
  box-sizing: border-box;
  border-radius: 5px;
  background-clip: padding-box;
  padding:0 20px 20px 20px;
}

th {
	
	color:39507a !important;
	text-align:center !important;
	}
	
	.alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
	color:39507a !important;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}
.alert-message code
{
    background-color: #fff;
    border-radius: 3px;
}

.alert-message-info
{
    background-color: #f4f8fa;
    border-color: #39507a;
}
.alert-message-info h4
{
    color: #5bc0de;
}
	</style>
    <script>
    function regresa()
	{
		parent.location.href='consultarmail.php'
	}
    </script>-->
    <div class="container" style="width:100%;margin-top:5%">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <!--<img id="profile-img" class="profile-img-card" src="Escudo_Usta.png" />-->
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">

			
<div class="box">
                        <div class="box-content">
                            <h4 class="tag-title"><strong>Bienvenido(a)</strong>.</h4>
                            <hr />
                            <?php 
                            
							$sql_mail = "SELECT m.DOCUMENTO, m.PRI_NOMBRE||' '||m.SEG_NOMBRE||' '||m.PRI_APELLIDO||' '||m.SEG_APELLIDO nombre ,
							m.MAIL, REPLACE(s.nom_sede,'V-','') sede,c.nom_circulo 
							from JRGUTIERREZ.mail_t_users m,src_sede s,src_cir_academico c,src_uni_academica u
							where  m.ID_SEDE=s.ID_SEDE (+)
							AND m.COD_UNIDAD=u.cod_unidad(+)
							AND u.id_circulo=c.id_circulo(+)
							AND DOCUMENTO = '$documento'"; 
							
                            $sql = "SELECT 
                                bt.NUM_IDENTIFICACION,
                                INITCAP(bt.NOM_TERCERO || ' ' || 
                                        bt.SIG_TERCERO || ' ' || 
                                        bt.PRI_APELLIDO || ' ' || 
                                        bt.SEG_APELLIDO) AS nombre,
                                bt.DIR_EMAIL
                            FROM 
                                SINU.BAS_TERCERO bt
                            WHERE 
                                bt.NUM_IDENTIFICACION = '$documento'";
                            

							$numero = $instance->numfilas($sql);
							
							if($numero>0 && $_POST["g-recaptcha-response"]!="")
							{
							
							
							
							?>
                            
                            <table class="table table-bordered" style="width:80%" align="center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php 
							$usuario = $instance->traerdatos($sql);
							
							while($datos = oci_fetch_array($usuario)) {?>
                            <tr>
                            <td><?php echo $datos['NUM_IDENTIFICACION']?></td>
                            <td><?php  echo $datos['NOMBRE']?></td>
                            <td><?php 
                            
                                $email = $datos['DIR_EMAIL'];
                                $domain = substr(strrchr($email, "@"), 1); // Obtiene el dominio después del '@'
                            
                                if ($domain == 'usantotomas.edu.co' || $domain == 'usta.edu.co') {
                                echo $email;
                                } else {
                                echo ''; // Campo vacío si el dominio es diferente
                                }
                            
                            ?>
                            </td>
                            </tr>
                            <?php }?>
                            </tbody>
                            </table>

                            
                         <!--   <h5 class="ml-5">Correo Secundario</h5>-->
                            <table class="table table-bordered" style="width:80%" align="center">

                                <tbody> 
                                <?php
                                $usuario_two = $instance->traerdatos($sql_mail);

                                $usuario = $instance->traerdatos($sql);
                                $datos = oci_fetch_array($usuario);

                                $found = false;
                                while($datosUser = oci_fetch_array($usuario_two)) {
                                    
                                    
                                    if ($datosUser['MAIL'] != $datos['DIR_EMAIL']) {
                                        $found = true;
                                    ?>
                                        <tr>
                                            <td><?php echo $datosUser['DOCUMENTO']  ?> </td>
                                            <td><?php echo $datosUser['NOMBRE']  ?></td>
                                            <td><?php echo $datosUser['MAIL']  ?></td>
                                        </tr>
                                    <?php

                                    } 
                                    
                                } 
                                if (!$found) {
                                    ?>
                                    <tr>
                                        <td colspan="3" style="text-align:justify">
                                            <em>No se encontraron correos secundarios.</em>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                </table>

                                <div class="container" style="width:80%" align="center">
                                    <p class="text-justify">
                                    <table class="table table-bordered">
                                        <td>
                                            <em>Si es estudiante recuerde que, para su primer acceso, la contase&ntilde;a asignada a su cuenta de correo es Estudiante.<?php echo $documento; ?><br /><br />
                                            Si es docente recuerde que, para su primer acceso, la contase&ntilde;a asignada a su cuenta de correo es Docente.<?php echo $documento; ?><br /><br />
                                            Si es adminstrativo recuerde que, para su primer acceso, la contase&ntilde;a asignada a su cuenta de correo es la misma de Windows<br /><br /> 
                                            </p>
                                        </td>
                                    </table>
                                </div>

                           


                            <!--<table class="table" style="width:80%; border:#FCFCFC" align="center">
                            <tr>
                            <td style="text-align:justify">Para consultar su correo electrónico, pulse <!--<a href="https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fa%2Fusantotomas.edu.co%2F&ltmpl=default&hd=usantotomas.edu.co&service=mail&sacu=1&rip=1#identifier" target="_blank">aquí</a><a href="https://www.outlook.com" target="_blank">aquí</a></td>
                            </tr>
                            </table>-->
                            
                            <?php } else {?>
                            
                            <div class="alert-message alert-message-info">
                <h4>
                    <strong>Error en n&uacute;mero de documento y/o captcha incorrecto.</strong></h4>
                <p>
                   

Por favor comuniquese con el Departamento de Tecnologías de la Información y las Comunicaciones al telefono 6015878797 Ext 1230 o al correo mesadeayuda@usantotomas.edu.co
            </div>
                            
                            <?php }?>

                            <button type="button" class="btn btn-danger" id="boton">Cerrar</button>
                        </div>
                    </div>



            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->
    
    <script>
    $(document).ready(function()
                        {
                            $("#boton").click(function()
                                            {
                                                $("#myModal").modal("hide");
                                                location.reload();
                                            });
                        });
    </script>
    
    
    
    