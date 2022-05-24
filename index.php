<?php
//Configuración global
//define("CONTROLADOR_DEFECTO", "Trivial");
//define("ACCION_DEFECTO", "index");

require("./controller/TrivialController.php");

//Conexión con BBDD
require_once dirname(__FILE__).'/connection/Conectar.php';

//Incluir todos los modelos
foreach(glob(dirname(__FILE__)."/model/*.php") as $file){
    require_once $file;
}

//Instancio el controlador
$controller = new TrivialController;


if (isset($_GET["accio"]) && $_GET["accio"] == "cerrarsesion"){
    $controller->cerrarsesion();
}
else if (isset($_POST["accio"]) && $_POST["accio"] == "pujarfitxer"){
    //echo print_r($_FILES);
    $controller->pujarfitxer();
}else if (isset($_POST["accio"]) && $_POST["accio"] == "registrarse"){
    //echo print_r($_FILES);
    $controller->registrarse();
}else if (isset($_GET["accio"]) && $_GET["accio"] == "obrepartida"){
    $controller->obrir_partida();
}else if (isset($_GET["accio"]) && $_GET["accio"] == "crearpartida"){
    //echo print_r($_FILES);
    $controller->crearpartida();
}else if (isset($_GET["accio"]) && $_GET["accio"] == "finalitzapartida"){
    //echo print_r($_FILES);
    $controller->finalitzaPartida();
}
else if (isset($_GET["accio"]) && $_GET["accio"] == "validarUsr"){
    //echo print_r($_FILES);
    $controller->validarUsr();
}
else{
    //Ejecuto el método
    $controller->index();

}




// //Cargamos controladores y acciones
// if(isset($_GET["controller"])){
//     $controllerObj=cargarControlador($_GET["controller"]);
//     lanzarAccion($controllerObj);
// }else{
//     $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
//     lanzarAccion($controllerObj);
// }
?>