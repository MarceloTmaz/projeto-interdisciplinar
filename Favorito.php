<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Favorito
 *
 * @author marcelo
 */
class Favorito {
    //put your code here
    private $idJogo;
    private $idUsuario;
    
    public function __construct($idJogo, $idUsuario) {
        $this->idJogo = $idJogo;
        $this->idUsuario = $idUsuario;
    }
    public function getIdJogo() {
        return $this->idJogo;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdJogo($idJogo): void {
        $this->idJogo = $idJogo;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }


}
