
<?php

class TrivialController
{
    var $jugadors;
    public $conectar;
	public $adapter;

    function __construct()
    {
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();

        // $this->jugadors = [
        //     1 => new Jugador("Jugador1","15000",1,0,0),
        //     2 => new Jugador("Jugador2","434",1,4,6)
        // ];
    }

    public function index(){

        //Asigno los coches a una variable que estará esperando la vista
        $rowset = $this->jugadors;


        //Le paso los datos a la vista
        require("view/jugadors.php");

    }

    public function pujarfitxer(){
        $target_dir = "./files/sources/imatges/imatges-usuaris/";
        if (isset($_COOKIE["ID"])){
            $identificador = $_COOKIE["ID"];
            $target_file = $target_dir . "imagenmolonga" . $identificador . ".jpg";
        }else{
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        }
        
        
        //echo print_r($_FILES, false);
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }


        require("view/cerrarsesion.php");
    }

    public function cerrarsesion(){

        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        //Le paso los datos a la vista
        require("view/cerrarsesion.php");

    }

    public function registrarse(){
        //CREAR UNA NOVA CLASSE USUARI dins model Usuari.php
        $sql = "SELECT * from usuaris_registrats";
        $result = $this->adapter -> query($sql);
        foreach($result as $value){
            
        }
        print_r($_POST, false);
        $usuari = new Usuari(); //DEFINIR AQUESTA CLASSE A Usuari.php
        $usuari->setcname($_POST["Usuario"]);

        $usuari->setcontra($_POST["Contra"]);

        $usuari->setcorreo($_POST["email"]);

        $usuari->save($this->adapter); //DEFINIR AQUESTA funcio dins  Usuari.php
        

    }

    public function obrir_partida(){
        print_r($_GET, false);
        $partida = new Partida("aux", date("d-m-Y"));
        $partida->load($this->adapter, $_GET["id"]);
        print_r($partida->getNom(), false);
        setcookie("NOMPARTIDA", $partida->getNom(), time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("IDPARTIDA", $_GET["id"], time() + (86400 * 30), "/");
        setcookie("NUMPREG", $partida->getPreguntes(), time() + (86400 * 30), "/");
        $conexion = $this->adapter;
        require("view/joc.php");

    }


    public function crearpartida(){
        $partida = new Partida("partida2", date('d-m-Y'));
        $partida->guardarPartida($this->adapter);
    


    }

    public function validarUsr(){
        $user = $_GET["username"];
        $sql = " SELECT * from usuaris_registrats where usr_username ='". $user ."'" ;  
        $result = $this->adapter -> query($sql);
        if ($result->num_rows > 0){
            //print_r("USUARI JA REIGSTRAT"); 
            echo 0;   
        }else{
            //print_r("USUARI NO REIGSTRAT");    
            echo 1;
        }
    }

    public function crearJugador(){
        $jugador = new Jugador("NomJugador",1);


    }

    public function FinalitzaPartida(){
        
    }
}

?>
