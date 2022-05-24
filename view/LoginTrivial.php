<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/RegistrarseTrivial.css?v=<?php echo time(); ?>">

        <title>Cool Trivial - Login</title>
    </head>
<div>
    
</div>
    <body>
        <div>
        <div class="row">
            <div class="column">
            <div class="container">
            <h1>
            Haz Login en 
            <span>Cool Trivial</span>
    </h1>
    
    <form action="../view/inici.php" method="post">
    <div class="field">
        <input id="Usuario" name="Usuario" type="text" placeholder=" " required>
        <label for="Usuario">Usuario</label>
    </div>

    <div class="field">
        
        <input type="password" placeholder=" " name="Contra" id="Contra" required>
        <label for="Contraseña">Contraseña</label>
    </div>
    
        <br>
        <input type="submit" name="LoginU" value="Entrar" id="RegistBTN">
        </div>

    </form>
    <!-- Trigger/Open The Modal -->
            </div>
            <div class="column"></div>
        </div>
        
    


    </div>
  


    
        </body>

        
</html>
