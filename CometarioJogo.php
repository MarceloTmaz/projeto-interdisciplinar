<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CometarioJogo
 *
 * @author marcelo
 */
class CometarioJogo {
    private $idComentario;
    private $descricao;
    private $idJogo;
    private $idUsuario;
    
    public function __construct($id, $descricao,$idjogo, $idU) {
        $this->idComentario = $id;
        $this->descricao = $descricao;
        $this->idJogo=$idjogo;
        $this->idUsuario = $idU;
    } 
    //put your code here
    public function getIdComentario() {
        return $this->idComentario;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getIdJogo() {
        return $this->idJogo;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdComentario($idComentario): void {
        $this->idComentario = $idComentario;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function setIdJogo($idJogo): void {
        $this->idJogo = $idJogo;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }


}
