<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Evento
 *
 * @author aluno
 */
class Evento {
    //put your code here
    
    private $idevento;
    private $nome;
    private $data;
    private $local;
    private $descricao;
    private $idUsuario;
    
    public function __construct($idevento, $nome, $data, $local, $descricao, $idUsuario) {
        $this->idevento = $idevento;
        $this->nome = $nome;
        $this->data = $data;
        $this->local = $local;
        $this->descricao = $descricao;
        $this->idUsuario = $idUsuario;
    }

    public function getIdevento() {
        return $this->idevento;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getData() {
        return $this->data;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdevento($idevento): void {
        $this->idevento = $idevento;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setData($data): void {
        $this->data = $data;
    }

    public function setLocal($local): void {
        $this->local = $local;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }


    
}
