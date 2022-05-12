
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

        $this->jugadors = [
            1 => new Jugador("Jugador1","15000",1,0,0),
            2 => new Jugador("Jugador2","434",1,4,6)
        ];
    }

    public function index(){

        //Asigno los coches a una variable que estará esperando la vista
        $rowset = $this->jugadors;


        //Le paso los datos a la vista
        require("view/jugadors.php");

    }

    public function pujarfitxer(){
        $target_dir = "./files/sources/imatges/";
        //echo print_r($_FILES, false);
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
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

}

?>
