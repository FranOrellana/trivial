<?php

require_once "recaptchalib.php";

$siteKey = "6Lf4UL0fAAAAAKcdHHZsms20ryJ8VcwLkpO2Ov_F";
$secret = "6Lf4UL0fAAAAAEHZC9VnjAUGdF_vGTD8T0at02iL";

$lang = "es";

$resp = null;

$error = null;

$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
?>
<html>
  <head><title>Aviso Legal reCAPTCHA</title></head>
  <body>
  <body style="background-color:black">
<?php
if ($resp != null && $resp->success) {
    echo "¡Correcto!";
}
$textes = array("¡Maria quiere conocerte!, chatea con ella en este enlace http://finladesassolteras.ru","¡Compra ahora un coche nuevo por menos de 1000€!","¡Hay maduritas calientes en tu zona!","¿Sabías que tienes una prima perdida cerca?","¡¡Felicidades!! ¡Has ganado un viaje a Marte con SpaceX!","¡Tienes BTC esperándote para que los recojas!","Bill Gates quiere una cita contigo, llama ahora +234 934741873","Hay una rumba esperando a que la recojas, clica aquí","¿Estás Soltero?.... ¡No esperes más y lígate a Julia!","Tu ubicación no es segura, un cartel de México viene a buscarte! ¡Envía un Bizum de más de 10€ en +32 682984102 para proteger tu seguridad!","¿Es cierto que buscas compañera de piso? ¡Carmen está soltera y busca piso!","Roberto quiere enviarte un mensaje, clica aquí para permitir el envió de su mensaje");
//echo print_r($textes, false);
?>
<p style="color:red; text-align:center">⚠️Completa el captcha para redirigirte al aviso legal de Trivial⚠️</p>
<p style="color:red; text-align:center">⚠️Complete the captcha to redirect you to the Trivial legal notice⚠️</p>
<br/>
<div >
    <form style="color:red; text-align:center" action="./avislegal2.php" method="post">
      <div style="display:inline-block"  class="g-recaptcha" data-callback="enableBtn" data-sitekey="<?php echo $siteKey;?>"></div>
      <br/>
      <script type="text/javascript"
          src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
      </script>
      <br/>  
      <input id="button1" type="submit" value="Aceptar" disabled>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <img style="margin: auto;" src="../files/avislegal/captcha.gif"img>
    </form>

    <script>
        function enableBtn(){
          document.getElementById("button1").disabled = false;
        }
      </script>
  </body>
</html>
