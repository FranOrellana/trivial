
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/RegistrarseTrivial.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css?v=<?php echo time(); ?>">
        <title>Cool Trivial - Registro</title>
    </head>
<div>
    <?php
     if(isset($_POST['crearU']))
        {
            echo 'Usuario Registrado!';
        }
    ?>
</div>
    <body>
        <div>
        <div class="row">
            <div class="column">
            <div class="container">
            <h1>
            Registrate en 
            <span>Cool Trivial</span>
    </h1>
        <p>Para poder disfrutar de más opciones es recomendable registrarse:</p>
    <form action="../index.php" method="post">
    <div class="field">
        <input id="Usuario" name="Usuario" onfocusout = "validateUsername()" type="text" placeholder=" " required>
        <label for="Usuario">Usuario</label>
    </div>
    <label id ="UsuarioErr" forerr="UsuarioErr" hidden>Usuario ya registrado, escoge otro</label>
    <div class="field">
    	<input id="email" name = "email"  type="email" placeholder=" " required>
        <label for="email">eMail</label>
    </div>    
    <div class="field">
        
        <input type="password" placeholder=" " name="Contra" id="Contra" required><div id="Ojo1"><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i></div>
        <label for="Contraseña">Contraseña:</label>
    </div>
    <div class="field">
        <input type="password" placeholder=" " id="ConfirmContra" required><div id="Ojo2"><i class="far fa-eye" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i></div>
        <label for="Confirma Contraseña">Confirma Contraseña:</label>
    </div>
        <br><br>
        <input id="myBtn" type="checkbox" class="form-check-input is-invalid" id="acepta_terminos1" required> Aceptar terminos y condiciones
        <input type="text" name="accio" value ="registrarse" hidden>
        <br><br>
        <input type="submit" name="crearU" value="Registrate" id="RegistBTN">
        </div>

    </form>
    <!-- Trigger/Open The Modal -->
            </div>
            <div class="column2"></div>
        </div>
        
    

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 style="text-align: center;"><strong>POLÍTICA DE PRIVACIDAD</strong></h2>
<p>&nbsp;</p>
<p>
    El presente Política de Privacidad establece los términos en que Cool Trivial usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de
    los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta
    Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
</p>
<p><strong>Información que es recogida</strong></p>
<p>
    Nuestro sitio web podrá recoger información personal por ejemplo: Nombre,&nbsp; información de contacto como&nbsp; su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida
    información específica para procesar algún pedido o realizar una entrega o facturación.
</p>
<p><strong>Uso de la información recogida</strong></p>
<p>
    Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios. &nbsp;Es
    posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún
    beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento.
</p>
<p>
    Cool Trivial está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.
</p>
<p><strong>Cookies</strong></p>
<p>
    Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y
    también facilita las futuras visitas recurrentes. Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.
</p>
<p>
    Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted
    puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted
    así lo quiera y la proporcione directamente. Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar
    la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.
</p>
<p><strong>Enlaces a Terceros</strong></p>
<p>
    Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no
    somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para
    confirmar que usted está de acuerdo con estas.
</p>
<p><strong>Control de su información personal</strong></p>
<p>
    En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.&nbsp; Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar
    o desmarcar la opción de recibir información por correo electrónico. &nbsp;En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.
</p>
<p>Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.</p>
<p>Cool Trivial se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.</p>
<br>
<input type="submit" id="AceptarT" name="aceptar" value="Estoy de acuerdo">
  </div>

</div>
    </div>
  


        <div id="Gradi"></div>
        </body>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="../js/MatchPass.js?v=<?php echo time(); ?>"></script>
        <script type="text/javascript" src="../js/ConfUsr.js?v=<?php echo time(); ?>"></script>
</html>