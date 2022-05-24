<?php

class Usuari
{
    var $usr_cname;
    var $contrasenya;
    var $email;
    
    
    function __construct(){

    }

    function setcname($cname){

        $this->usr_cname = $cname;

    }

    function getcname(){

        return $this->usr_cname;

    }

    function setcontra($contra){

        $this->contrasenya = $contra;

    }

    function getcontra(){

        return $this->contrasenya;
    }

    function setcorreo($correo){

        $this->email = $correo;

    }

    function getcorreo(){

        return $this->email;
    }
 
    function save($connect){
        
        if ($this->existeixUsuarioEmail($connect)){
        
        }
        else
           {
            $sql = "INSERT INTO usuaris_registrats (usr_username, usr_pwd, usr_email) values ('".$this->usr_cname."','".$this->contrasenya."','".$this->email."')";  
            //print_r($sql);
            if ($connect -> connect_errno) {
                //print("error");
                echo "Failed to connect to MySQL: " . $connect -> connect_error;
                exit();
              }else{
                //print("no error");
                $result = $connect -> query($sql);
                //print_r($result,false);
        
              }
           }

       
       
    }

    function existeixUsuarioEmail($connect){
        $sql = " SELECT * from usuaris_registrats where usr_username ='". $this->usr_cname ."' or usr_email ='". $this->email ."'" ;  
        $result = $connect -> query($sql);
        if ($result->num_rows > 0){
            print_r("USUARI JA REIGSTRAT");    
        }else{
            print_r("USUARI NO REIGSTRAT");    
        }
        print_r($result,false);

    }
    


}
?>