<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Noticia
 *
 * @author marcelo
 */
class Noticia {
    //put your code here
    private $idnoticia;
    private $descicao;
    private $idUsuario;
    private $idCategoria;
    private $idJogos;
    public function __construct($idnoticia, $descicao, $idUsuario, $idCategoria,$idJogos) {
        $this->idnoticia = $idnoticia;
        $this->descicao = $descicao;
        $this->idUsuario = $idUsuario;
        $this->idCategoria = $idCategoria;
        $this->idJogos=$idJogos;
    }
    public function getIdJogos() {
        return $this->idJogos;
    }

    public function setIdJogos($idJogos): void {
        $this->idJogos = $idJogos;
    }

        public function getIdnoticia() {
        return $this->idnoticia;
    }

    public function getDescicao() {
        return $this->descicao;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdnoticia($idnoticia): void {
        $this->idnoticia = $idnoticia;
    }

    public function setDescicao($descicao): void {
        $this->descicao = $descicao;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function setIdCategoria($idCategoria): void {
        $this->idCategoria = $idCategoria;
    }


}
