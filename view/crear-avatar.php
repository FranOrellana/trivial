<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Avatar - Trivial</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <link rel="stylesheet" href="../css/estilos.css">

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
    <link href="../css/carousel.css?v=<?php echo time();?>" rel="stylesheet">
  </head>
  
  <body>
      
    <?php
      $files = scandir('../files/sources/imatges');
      $i = 1;
      $rutas ="";
      foreach($files as $file) {
        if($file == '.' || $file == '..') continue;
        //print "../files/sources/imatges/" . $file . '<br>';
        $rutas .=   "../files/sources/imatges/" . $file . ";" ;
        $i++;
        
      }
    ?>
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->


      <div class="container_dani">
        <!-- Three columns of text below the carousel -->
        <div class="row">
        
          <div class="col-lg-20">
            <h2>Selecciona tu avatar</h2>
            <img id="imagen-avatar" class="bd-placeholder-img rounded-circle" width="140" height="140" src="../files/sources/imatges/pato lucas.jpg"></img>
        
            <svg xmlns="http://www.w3.org/2000/svg" onclick="next('<?php echo $rutas ?>')" width="30" height="30" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
              <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
            </svg>
            
          </div><!-- /.col-lg-4 -->
          
          
          <div class="col-lg-20">
          Sube una imagen:
            <form action="../index.php" form="form1" method="POST" enctype="multipart/form-data">
              <div class="image-upload">
                <label for="file-input">
                  <svg xmlns="http://www.w3.org/2000/svg" form="form1" width="30" height="30" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                  </svg>
                </label>
                <input type="file" name="fileToUpload" id="file-input" > 
              </div>

              <label for="file-submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-up" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
                  <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                </svg>
              </label>
              <input type="submit" value="Sube Imagen" name="submit" id="file-submit" hidden> 
              <input type="text" name="accio" value ="pujarfitxer" hidden>
            </form>
          </div>
        </div><!-- /.row -->
      <!-- /.container -->
      </div>

      <h2 id="titulo1">¿Quieres tener musculatura de dios griego?</h2>

      <p id="p1">¡¡ESTAS DE SUERTE!!.</p>

<p id="p1">Crea tu propio avatar para tranformate en una bestia de musculos.</p>

<div style ="text-align:center;">
<button onclick="document.getElementById('myImage').src='../files/sources/imatges/mamado.png '">Despues de crear avatar</button>

<img id="myImage" src="../files/sources/imatges/gordinflon.png" style="width:100px">

<button onclick="document.getElementById('myImage').src='../files/sources/imatges/gordinflon.png'">Antes de crear avatar</button>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/perfil.js?v=<?php echo time(); ?>"></script>
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>                               
  </body>
</html>
