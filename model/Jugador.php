
<?php

class Jugador
{
    //Variables o atributos
    var $nom;
    var $ranking;
    var $usr_id;
    var $puntos;
    var $aciertos;

    function __construct($miNom,$mi_usr_id){

        $this->nom = $miNom;
        $this->ranking = 0;
        $this->usr_id = $mi_usr_id;
        $this->puntos = 0;
        $this->aciertos = 0;
    }

    //Funciones o métodos
    function setNom($miNom){

        $this->nom = $miNom;

    }

    function getNom(){

        return $this->nom;

    }

    function setRanking($miRanking){

        $this->ranking = $miRanking;

    }

    function getRanking(){

        return $this->ranking;

    }

    function setPuntos($misPuntos){

        $this->puntos = $misPuntos;
    }
    
    function getPuntos(){

        return $this->puntos;
    }

    function setAciertos($misAciertos){

        $this->aciertos = $misAciertos;
    }
    
    function getAciertos(){

        return $this->aciertos;
    }

    function updateJugador($conexion, $id,$puntsJug,$aciertosJug){
        $sql = "UPDATE JUGADORS SET jug_punts =".$puntsJug.", jug_aciertos =".$aciertosJug. " WHERE ID=". $id;
        $updatePlayer = $conexion -> query($sql);

    }

}
?>