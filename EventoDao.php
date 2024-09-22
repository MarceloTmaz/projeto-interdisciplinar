<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of EventoDao
 *
 * @author aluno
 */
include_once './Evento.php';
include_once './UniversalConnect.php';
class EventoDao {
    
    private $link;
    
    public function __construct() {
        $this->link = UniversalConnect::doConnect();
    }
     public function criar(Evento $evento) {
        try {
            $sql="INSERT INTO evento (nome,data,local,descricao, idusuario) VALUES (:nome,:data,:local, :desc, :idU);";

            $stm = $this->link->prepare($sql);
            $stm->bindValue(":nome", $evento->getNome());
            $stm->bindValue(":data", $evento->getData());
            $stm->bindValue(":local",$evento->getLocal());
            $stm->bindValue(":desc", $evento->getDescricao());
            $stm->bindValue(":idU", $evento->getIdUsuario());
            return $stm->execute();
        
        } catch (Exception $exc) {
            echo $exc;
        }    
    }
     public function listar() {
               try {       
            $sql="select * from evento;";
            $stm=$this->link->prepare($sql);
            $stm->execute(); 
            
            $eventos = array();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
                $ev = new Evento(0,0,0,0,0,0);
                $ev->setIdevento($row->idevento);
                $ev->setDescricao($row->descricao);
                $ev->setIdUsuario($row->idusuario);
                $ev->setNome($row->nome);
                $ev->setData($row->data);
                $ev->setLocal($row->local);
                // Adicione o objeto Jogo ao vetor
                $eventos[] =$ev;
            }

            return $eventos;
          
            
        } catch (Exception $ex) {
            echo "$ex";
        }
    }
       public function atualizar(Evento $ev){
        $sql= "UPDATE evento SET nome =:nome, data=:data,local=:local, descricao=:desc WHERE (idevento = :id)";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":nome",$ev->getNome());
        $stm->bindValue(":data",$ev->getData());
        $stm->bindValue(":local",$ev->getLocal());
        $stm->bindValue(":desc", $ev->getDescricao());
        $stm->bindValue(":id", $ev->getIdevento());
        return $stm->execute();
        
    }
    
    public function deletar($id) {
        $sql="DELETE FROM evento WHERE (idevento = :id);";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }
    
     public function um($id) {
        $sql="select* FROM evento WHERE (idevento = :id);";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":id", $id);
         $stm->execute(); 
            
            $eventos = array();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
                $ev = new Evento(0,0,0,0,0,0);
                $ev->setIdevento($row->idevento);
                $ev->setDescricao($row->descricao);
                $ev->setIdUsuario($row->idusuario);
                $ev->setNome($row->nome);
                $ev->setData($row->data);
                $ev->setLocal($row->local);
                // Adicione o objeto Jogo ao vetor
                $eventos[] =$ev;
            }

            return $eventos;
    }
}
