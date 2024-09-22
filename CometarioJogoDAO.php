<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CometarioJogoDAO
 *
 * @author marcelo
 */
include_once './UniversalConnect.php';
include_once './CometarioJogo.php';
class CometarioJogoDAO {
    //put your code here
    private $link;
    
    public function __construct() {
        $this->link = UniversalConnect::doConnect();
    }
    
    public function listar($id) {
         try {       
            $sql = "select * from cometariojogos where idjogos = :id";
            $stm=$this->link->prepare($sql);
            $stm->bindValue(":id",$id);
            $stm->execute(); 
            
            $cometarios = array();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
                $cjogo = new CometarioJogo(0,0,0,0);
                $cjogo->setIdJogo($row->idjogos);
                $cjogo->setIdComentario($row->idcometariojogos);
                $cjogo->setDescricao($row->descricao);
                $cjogo->setIdUsuario($row->idusuario);

                // Adicione o objeto Jogo ao vetor
                $cometarios[] =$cjogo;
            }

            return $cometarios;/*
            if ($stm->rowCount() > 0) {
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } else {
                return false;
            }*/
            
        } catch (Exception $ex) {
            echo "$ex";
        }
    }
    
    public function criar($cometario) {
        $sql = "INSERT INTO cometariojogos (descricao, idjogos, idusuario) VALUES (:desc, :idJ, :idU);";
        $stm=$this->link->prepare($sql);
        $stm->bindValue(":desc",$cometario->getDescricao());
        $stm->bindValue(":idJ",$cometario->getIdJogo());
        $stm->bindValue(":idU",$cometario->getIdUsuario());
        $stm->execute();
    }
    public function atualizar(CometarioJogo $cometario){
        $sql= "UPDATE cometariojogos SET descricao = :desc WHERE (idcometariojogos = :id)";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":desc", $cometario->getDescricao());
        $stm->bindValue(":id", $cometario->getIdComentario());
        return $stm->execute();
        
    }
    public function deletar($id) {
        $sql="DELETE FROM cometariojogos WHERE (idcometariojogos = :id);";
         $stm = $this->link->prepare($sql); 
            $stm->bindValue(":id",$id);
            return $stm->execute();
    }
    
    public function jogoMaisComentado() {
        try {  
            $sql="select j.idjogos, j.nomejogos, j.descricao, j.idusuario, COUNT(*) qtd from jogos j
                JOIN cometariojogos c on c.idjogos=j.idjogos
                group by j.idjogos
                order by qtd desc 
                limit 5;";
            $stm=$this->link->prepare($sql);
            $stm->execute();
        
              
           
            
           // $jogos = []; // Vetor para armazenar os objetos Jogo
            $jogos = array();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                  $jogo = new Jogo(0,0,0);
                $jogo->setId($row->idjogos);
                $jogo->setNome($row->nomejogos);
                $jogo->setDescricao($row->descricao);
                $jogo->setIdUsuario($row->idusuario);

                // Adicione o objeto Jogo ao vetor
                                $jogos[] =$jogo;
            }

            return $jogos;/*
            if ($stm->rowCount() > 0) {
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } else {
                return false;
            }*/
            
        } catch (Exception $ex) {
            echo "$ex";
        }
        
    }
}

