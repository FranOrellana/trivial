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
      <img style="margin: auto; center" src="../files/avislegal/captcha.gif"img>
    </form>

    <script>
        function enableBtn(){
          document.getElementById("button1").disabled = false;
        }
      </script>
  </body>
</html>
