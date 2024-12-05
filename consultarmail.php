<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->

    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

    <style>
	/*
 * Specific styles of signin component
 */
/*
 * General styles
 */


.card-container.card {
    width: 350px;
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #fff;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
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
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: #0685FF;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #0066CC;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #0066CC;
}

.btn-signin {
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}


.forgot-password {
    color: #0685FF;
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: #004e99;
}


	</style>


<script>

$(document).ready(function(e) {	
$('#myModal').modal({
			   keyboard : false,
			   show : true,
			   backdrop : 'static'			   
			   });
	
    
});
	

	
	
	


</script>




<!-- Modal -->

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Información importante</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
		 <center>
        <strong>SERVIDORES PARA CONFIGURACIÓN DISPOSITIVOS MOVILES</strong><br>
POP3: pop.gmail.com   Puerto: 995    IMAP: imap.gmail.com    Puerto: 993      SMTP: smtp.gmail.com   Puerto: 587
			 </center> 

 <br>

La    creación    de    cuentas    toma    2    días    hábiles, 
		  <br><br>


 <div style="text-align: justify">
Consulte su correo institucional con frecuencia y así podrá estar informado de la actividad universitaria. A este correo se envían los comunicados institucionales y las circulares de Vicerrectoría.

La contraseña inicial es el número de documento, en caso de ser de menos de 8 dígitos se completa con números cero "0" al final, hasta completar

8 dígitos. Al ingresar se le solicitará cambiar la contraseña tenga en cuenta que está debe contener mínimo ocho caracteres entre números, símbolos, letras mayúsculas y minúsculas.
	</div><br>

 

<strong>FAVOR CAMBIAR LA CONTRASEÑA POR UNA QUE SÓLO USTED CONOZCA.</strong><br>

Nota: las cuentas de correo electrónico que no sean usadas por más de siete (7) meses pueden ser suspendidas.
<br><br>
 

SUGERENCIA Y OBSERVACIONES: mesadeayuda@usantotomas.edu.co
      </div>
    </div>
  </div>
</div>
    
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="Escudo_Usta.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="respuesta.php">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="number" name="documento" id="inputEmail" class="form-control" placeholder="Digitar Número de Documento" required autofocus>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Consultar</button>
            </form><!-- /form -->

        </div><!-- /card-container -->
    </div><!-- /container -->