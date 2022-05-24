<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Trivial CEINA</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/modals/">

    

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
      .modal-footer{
        text-align: center;
        display: flex;
        flex-wrap: wrap;
        flex-shrink: 0;
        align-items: center;
        justify-content: flex-end;
        padding: 0.75rem;
        border-top: 1px solid #dee2e6;
        border-bottom-right-radius: calc(0.3rem - 1px);
        border-bottom-left-radius: calc(0.3rem - 1px);
      }
     
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/joc.css?v=<?php echo time(); ?>" rel="stylesheet">
  </head>
  <body>
  <?php
    //include 'menu.php';

    //Conexión con BBDD
    require_once dirname(__FILE__).'/../connection/Conectar.php';

    $conectar=new Conectar();
    $conexion=$conectar->conexion();

    $sql = "SELECT * FROM preguntes p inner join respostes r on p.id = r.preg_id";
    $result = $conexion -> query($sql);
    
  
  ?>




<div class="container px-1">



<div id="game">
  <div class="bg-dark bg-dark rounded">
    <div class="p-1">
      <div class="float-end">
        <a href="" class="btn btn-sm btn-danger">
          Abandonar
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
          </svg>
        </a>
        
      </div>
      <div class="p-1">
        <h5 class="text-light text-center m-0">Partida X</h5>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-7 col-xl-8 p-0 d-flex flex-column">
          <div class="flex-grow-1 d-flex flex-column">
            <div class="p-1">
              <div class="alert alert-primary p-1 m-0">
                <div class="d-none d-sm-block float-left pr-2">
                  
                </div>
                <strong>¡Juega con tus amigos!</strong>
                <br>¡Comparte con ellos el enlace a la partida!<br>
                <div class="input-group link-input">
                  <input type="text" class="form-control" readonly="" value="Link generado" id="linkCopiar">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" data-clipboard-text="" title="Copiar al portapapeles" onclick="copiarPortapapeles()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                      <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="p-1 flex-grow-1 d-flex flex-column" id="joc">
              <div class="bg-whats rounded py-5 px-1 text-center flex-grow-1">
                <h1>Crea una partida para compartir con tus amigos</h1>
                <div class="container-fluid py-3">
                  <div class="row">
                    <div class="col-0 col-md-2 col-xl-3">
                    </div>
                    <div class="col-12 col-md-8 col-xl-6">
                      <button class="btn btn-lg btn-primary btn-block" onclick='crearPartida()'>Crear partida</button>
                      <button type="button" class="btn btn-lg btn-secondary btn-block" data-bs-toggle="modal" data-bs-target="#ModalConfig">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                        Ajustes partida
                        
                      </button>

                      <!-- Modal CONFIGURACIO PARTIDA -->
                      <div class="modal fade" id="ModalConfig" tabindex="-1" role="dialog" aria-labelledby="ModalConfigLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="ModalConfigLabel">Configuracion Partida</h5>
                              <a href="" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                              </a>
                            </div>
                            <div class="modal-body">
                            <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Tiempo por turno</label>
                          <input class="form-check-input" type="checkbox" onclick="activarTiempo()" role="switch" id="idactivar">
                        </div>
                          
                          <br>
                          <label for="disabledRange" class="form-label">Tiempo (Min)</label>
                          <br>
                          <input type="range" class="form-range" min="5" max="20" step="5" id="idtiempo"disabled oninput="this.nextElementSibling.value = this.value"> <output>5</output>    
                          <br>
                          <br>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" onclick="activarComodin()" role="switch" id="activarComodin">
                              <label class="form-check-label" for="flexSwitchCheckDefault">Activar comodin</label>
                            </div>
                              <br>
                              <br>
                              <label class="form-check-label" for="comodin">
                              ComodinesX
                              </label>
                              <br>
                              
                                 <input class="form-check-input" type="checkbox" onclick="" value="" id="comodin1" disabled> 
                                 
                              
                              </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="button" class="btn btn-primary" onclick="GuardarC()">Guardar configuracion</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-4 p-0 d-flex flex-column">
          <div class="p-1 flex-grow-1">
            <div class="scoreboard bg-whats rounded"><!-- Per cada jugador de la partida loop -->
              <div class=""><div>
                <div class="float-left ml-1">
                  <div><span class="badge badge-dark">1</span> Jugador 1
                </div>
                <div>
                </div>
              </div>
              <div class="float-right mr-1">
                <div>0 puntos</div>
                <div>0 aciertos</div></div><div class="clearfix">

                </div>
              </div>
            </div>
          </div>
        </div>
  </div>








 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../js/joc.js?v=<?php echo time();?>"></script>
<script> 

  function activarTiempo(){
    if (document.getElementById("idactivar").checked ){
      document.getElementById("idtiempo").disabled = false;
    }else {
      document.getElementById("idtiempo").disabled = true;
    }
  }
    function GuardarC(){

     alert ("La configuración se ha guardado correctamente");
     }
        function activarComodin(){
            alert(1);
           if (document.getElementById("activarComodin").checked ){
            document.getElementById("comodin1").disabled = false;
           }else {
            document.getElementById("comodin1").disabled = true;
           }
          }
        
</script>
      
  </body>
</html>
