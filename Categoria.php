<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Categoria
 *
 * @author marcelo
 */
class Categoria {
    //put your code here
    private $id;
    private $descricao;
    private $idU;
        public function __construct( $descricao,$idU) {
        $this->descricao = $descricao;
        $this->idU=$idU;
    } 
    public function getId() {
        return $this->id;
    }
    public function getIdU() {
        return $this->idU;
    }

    public function setIdU($idU): void {
        $this->idU = $idU;
    }

        public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }


    
}
