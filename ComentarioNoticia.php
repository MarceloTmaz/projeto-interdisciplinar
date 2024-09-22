<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ComentarioNoticia
 *
 * @author marcelo
 */
class ComentarioNoticia {
     private $idComentario;
    private $descricao;
    private $idNoticia;
    private $idUsuario;
    
    public function __construct($id, $descricao,$idNoticia, $idU) {
        $this->idComentario = $id;
        $this->descricao = $descricao;
        $this->idNoticia=$idNoticia;
        $this->idUsuario = $idU;
    } 
    //put your code here
    public function getIdComentario() {
        return $this->idComentario;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getIdNoticia() {
        return $this->idNoticia;
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

    public function setIdNoticia($idNoticia): void {
        $this->idNoticia = $idNoticia;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }


}
