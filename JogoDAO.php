<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of JogoDAO
 *
 * @author marcelo
 */
include_once './UniversalConnect.php';
include_once './Jogo.php';
include_once './NoticiaDAO.php';
class JogoDAO {
    private $link;
    
    public function __construct() {
        $this->link = UniversalConnect::doConnect();
    }
    //put your code here
    public function inserirJogo(Jogo $jogo) {
        try {
            $sql="INSERT INTO jogos (nomejogos, descricao, idusuario) VALUES (:nome, :desc, :idU);";

            $stm = $this->link->prepare($sql); 
            $stm->bindValue(":nome", $jogo->getNome());
            $stm->bindValue(":desc", $jogo->getDescricao());
            $stm->bindValue(":idU", $jogo->getIdUsuario());
            return $stm->execute();
        
        } catch (Exception $exc) {
            echo $exc;
        }    
    }
    
    public function atualizarJogo(Jogo $jogo){
        $sql= "UPDATE jogos SET nomejogos = :nome, descricao = :desc WHERE (idjogos = :id)";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":nome", $jogo->getNome());
        $stm->bindValue(":desc", $jogo->getDescricao());
        $stm->bindValue(":id", $jogo->getId());
        return $stm->execute();
        
    }
    
    public function selectAll() {

       try {       
            $sql="select * from jogos";
            $stm=$this->link->prepare($sql);
            $stm->execute(); 
            
           // $jogos = []; // Vetor para armazenar os objetos Jogo
            $jogos = array();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
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
    
    public function deletar($id) {
         try {   
             $sqlpre1="DELETE FROM favoritos WHERE (idjogos=:idJ);";   
              $stm2 = $this->link->prepare($sqlpre1); 
                $stm2->bindValue(":idJ", $id);
                 $stm2->execute();
                 
            $sqlpre2="DELETE FROM cometariojogos WHERE (idjogos = :id);";
                $stm3 = $this->link->prepare($sqlpre2); 
                $stm3->bindValue(":id", $id);
                 $stm3->execute();
        $dao=new NoticiaDAO();
        $dao->deletarNoticiaCadeiaJogo($id);
        $sqlpre3="DELETE FROM noticia WHERE (idjogos = :id);";
        $stm4 = $this->link->prepare($sqlpre3); 
        $stm4->bindValue(":id", $id);
        $stm4->execute();
        
             $sql="DELETE FROM jogos WHERE (idjogos = :id);";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":id", $id);
        return $stm->execute();
         } catch (Exception $ex) {
             echo $ex;
        }
    }
    
     public function selectOne($nome) {

       try {       
            $sql="select * from jogos WHERE (nomejogos = :no)";
           $stm = $this->link->prepare($sql); 
             $stm->bindValue(":no", $nome);
            $stm->execute(); 
            
           // $jogos = []; // Vetor para armazenar os objetos Jogo

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
                $jogo = new Jogo(0,0,0);
                $jogo->setId($row->idjogos);
                $jogo->setNome($row->nomejogos);
                $jogo->setDescricao($row->descricao);
                $jogo->setIdUsuario($row->idusuario);

                // Adicione o objeto Jogo ao vetor
                return $jogo;
            }

            //return $jogos;
            /*
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
