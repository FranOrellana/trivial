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
 
      <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

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
    <?php 
      $PROTOCOL = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
      $DOC_ROOT = $PROTOCOL.'://'.$_SERVER['SERVER_NAME'];
      
      //The project path points to the root file (index.php, or whatever your index file is).
      $projectRoot = dirname($DOC_ROOT.$_SERVER['SCRIPT_NAME']).'/';
      
      print_r($projectRoot);
      print_r(dirname(__DIR__));



      // $access_token =  'c3dc2b098fbbaf633d9c5e68bcde57db4bd0d8a3';
      // $long_url='http://localhost/ProjecteCEINA/trivial/index.php?accio=obrepartida&id=4';
      // $url = 'https://api-ssl.bitly.com/v3/shorten?access_token='.$access_token.'&longUrl='.$long_url;
      // $ch1 = curl_init($url);  //open connection
      // curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET"); 
      // curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, 0 );
      // curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0 );
      // curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1 );
      // $resultURL = curl_exec($ch1); //execute post
      // $data_array = json_decode($resultURL);
      // echo "<pre>";
      // echo 'Long url:  '.$long_url.'<br>';
      // echo 'shortened url: '.$data_array->data->url;
    ?>
    
    <!-- Custom styles for this template -->
    <link href="<?php echo $projectRoot;?>/css/joc.css?v=<?php echo time(); ?>" rel="stylesheet">
  </head>
  <body>
  <?php
    //include 'menu.php';
    //Conexión con BBDD
    // require_once dirname(__FILE__).'/../connection/Conectar.php';
    // print_r($_SERVER['DOCUMENT_ROOT']);
    // $conectar=new Conectar();
    // $conexion=$conectar->conexion();

    
    $sql = "SELECT * FROM preguntes p inner join respostes r on p.id = r.preg_id order by RAND()";
    $result = $conexion -> query($sql);
    
    $sqlJugadors = "SELECT j.usr_id, j.jug_nom, j.jug_punts, j.jug_aciertos, p.part_nom FROM jugadors j 
    inner join jugadors_partida pj 
    on j.ID = pj.jug_id 
    inner join partida p
    on p.ID = pj.part_id
    where p.id =".$_COOKIE["IDPARTIDA"] ;

    $resultJugadors = $conexion -> query($sqlJugadors);
   

    $respostes_correctes = array();
    $preguntes = array();
    $respostes = array();
    $imatges = array();
    $i = 1;
    foreach ($result as $value){
      //print_r ($value, false);
      $respostes_correctes[$value["preg_pregunta"]] = $value["resp_correcte"];
      $preguntes[$i] = $value["preg_pregunta"];
      $respostes[$value["preg_pregunta"]] = $value["resp_correcte"] . ";" . $value["resp_incorrecte_1"] . ";" . $value["resp_incorrecte_2"] . ";" . $value["resp_incorrecte_3"] ;
      $imatges[$value["preg_pregunta"]]= $value["preg_img"];
      $i++;
    }
    $jugadors = array();
    $j=1;
    foreach ($resultJugadors as $value2){
      $jugadors[$j] = [$value2["usr_id"], $value2["jug_nom"], $value2["jug_punts"], $value2["jug_aciertos"]];
      $j++;
    }
    // print_r($jugadors);
    // print_r($nompartida);

    //print_r ($preguntes[2], false);
    //print_r ($preguntes[2], false);
    //print_r ($preguntes[3], false);
    //print_r ($respostes_correctes[$preguntes[2]], false);
    //print_r ($respostes[$preguntes[2]], false);
    //$todas_respuestas = explode(";", $respostes[$preguntes[2]]);
    $preg = json_encode($preguntes,JSON_UNESCAPED_UNICODE);
    $resp = json_encode($respostes,JSON_UNESCAPED_UNICODE);
    $correctes = json_encode($respostes_correctes,JSON_UNESCAPED_UNICODE);
    $img = json_encode($imatges,JSON_UNESCAPED_UNICODE);
    //print_r (, false);
    // setcookie("USR_ID", 1, time() + (86400 * 30), "/"); // 86400 = 1 day
    // $_COOKIE['USR_ID'] = 1;
    if (!isset($_COOKIE["USR_ID"])){
      //Usuari anònim
      if (!isset($_COOKIE["NOMJUGADOR"])){
        //El jugador no existeix (ens arriba desde obrir partida, el jugador entra per el link compartit)
       
    
      }else{
        $isNotAnon = 'd-none';
      }
    }else{
      //Usuari registrat
      $isNotAnon = 'd-none';
    }
  
  ?>

<div class="container px-1">
  <div id = "anon" class="bg-whats rounded py-5 px-1 text-center flex-grow-1 <?php echo $isNotAnon; ?> ">
                <h1>NICKNAME</h1>
                <div class="container-fluid py-3">
                  <div class="row">
                    <div class="col-0 col-md-2 col-xl-3">
                    </div>
                    <div class="col-12 col-md-8 col-xl-6">
                    <form>
                      <div class="form-row align-items-center" action="../index.php" method="post">
                        <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Introdueix el vostre nickname</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                          </div>
                        </div>
                        <div class="col-auto">
                          <button id = "crearplayer" type="submit" class="btn btn-primary mb-2" onclick = "">Submit</button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
 

<div id="game">
  <div class="bg-dark bg-dark rounded">
    <div class="p-1">
      <div class="float-end">
        <a href="./inici.php" class="btn btn-sm btn-danger">
          Abandonar
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
          </svg>
        </a>
        
      </div>
      <div class="p-1">
        <h5 class="text-light text-center m-0">Partida <?php echo $_COOKIE["NOMPARTIDA"] ?></h5>
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
                <h1>Inicia la partida</h1>
                <div class="container-fluid py-3">
                  <div class="row">
                    <div class="col-0 col-md-2 col-xl-3">
                    </div>
                    <div class="col-12 col-md-8 col-xl-6">
                      <button class="btn btn-lg btn-primary btn-block" onclick='startGame(<?php echo $preg . ",". $resp . ",". $correctes .",". $img;?>)'>¡A jugar!</button>
                      <button type="button" class="btn btn-lg btn-secondary btn-block" data-bs-toggle="modal" data-bs-target="#ModalConfig">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                        </svg>
                        Ajustes
                        
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
                              Configuracio de la partida 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="button" class="btn btn-primary">Guardar configuracion</button>
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
            <?php 
              for ($i = 1; $i <= count($jugadors); $i++) {
                echo `<div class="scoreboard bg-whats rounded"><!-- Per cada jugador de la partida loop -->
                <div class=""><div>
                  <div class="float-left ml-1">
                    <div><span class="badge badge-dark">1</span> `.$jugadors[$i][1].`
                  </div>
                  <div>
                  </div>
                </div>
                <div class="float-right mr-1">
                  <div>`.$jugadors[$i][2].` puntos</div>
                  <div>`.$jugadors[$i][3].` aciertos</div></div><div class="clearfix">
  
                  </div>
                </div>
              </div>`;
            }
             ?>
            
          </div>
        </div>
  </div>








 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?php echo $projectRoot;?>./js/joc.js?v=<?php echo time();?>"></script>
      
  </body>
</html>
