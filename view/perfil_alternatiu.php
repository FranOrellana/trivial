<!doctype html>
<html lang="es">
<?php
  if (isset($_COOKIE["nomusuari"])){
    //echo ($_COOKIE["nomusuari"]);
    $usuari = ($_COOKIE["nomusuari"]);
  }
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

  <?php

  $files = scandir('../files/Perfils');
  $i = 1;
  $rutas ="";
  foreach($files as $file) {
    if($file == '.' || $file == '..') continue;
    //print "../files/Perfils/" . $file . '<br>';
    $rutas .=   "../files/Perfils/" . $file . ";" ;
    $i++;
    
  }

  ?>
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../files/andrea.jpg" alt="" width="72" height="57">
      <h2>Pàgina de perfil</h2>
      <p class="lead">Aquí podràs modificar les teves dades</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-first">
      <img id="imatge_perfil"  class="bd-placeholder-img rounded-circle" width="100%" height="400" src="../files/<?php echo $usuari;  ?>.jpg" </img>

      <form class="card p-2">
        <a  class="btn btn-secondary" onclick="next('<?php echo $rutas;  ?>')" >Next</a> 
        <br>
        <a  class="btn btn-secondary" onclick="previous() " >Previous</a>
        </form>
      
        
      </div>
      <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Aquí pots editar les teves dades</h4>
        <form>
          <div class="col-12">
            <label for="username" class="form-label">Username</label>
            <div class="input-group has-validation">
              <span class="input-group-text">@</span>
              <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback">
                Your username is required.
              </div>
            </div>
          </div>

          <div class="col-12">
            <label for="password" class="form-label">password </label>
            <input type="password" class="form-control" id="password" placeholder="" >           
          </div>

          <div class="col-12">
            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" disabled>
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

         

          <button type="submit" class="btn btn-primary">Actualitzar</button>
        </form>
      </div>
      <hr>
      <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Informació del jugador</h4>

          <div class="col-12">
            <label for="email" class="form-label">Email </label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" disabled>
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Trivial Ceina</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>



    <script >
    function next(rutas){
      console.log(rutas);
      var image = document.getElementById("imatge_perfil"); 
      ruta_imatge = "../files/Perfils/images - copia.jpg";
  
      image.src = ruta_imatge;
    }

    function previous(){
      
    }

    </script>

      <script src="form-validation.js"></script>
  </body>
</html> 
