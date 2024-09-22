<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**select COUNT(*) from projentointer.cometariojogos where idjogos=1;
 * Description of CometarioNoticiaDAO
 *
 * @author marcelo
 */
include_once './UniversalConnect.php';
include_once './ComentarioNoticia.php';

class ComentarioNoticiaDAO {
    private $link;
    
    public function __construct() {
        $this->link = UniversalConnect::doConnect();
    }
    
    public function listar($id) {
         try {       
            $sql = "select * from cometarionoticia where idnoticia = :id";
            $stm=$this->link->prepare($sql);
            $stm->bindValue(":id",$id);
            $stm->execute(); 
            
            $cometarios = array();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
                $cn = new ComentarioNoticia(0,0,0,0);
                $cn->setIdNoticia($row->idnoticia);
                $cn->setIdComentario($row->idcometarionoticia);
                $cn->setDescricao($row->descricao);
                $cn->setIdUsuario($row->idusuario);

                // Adicione o objeto $cn ao vetor
                $cometarios[] =$cn;
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
        $sql = "INSERT INTO cometarionoticia (descricao, idnoticia, idusuario) VALUES (:desc, :idN, :idU);";
        $stm=$this->link->prepare($sql);
        $stm->bindValue(":desc",$cometario->getDescricao());
        $stm->bindValue(":idN",$cometario->getIdNoticia());
        $stm->bindValue(":idU",$cometario->getIdUsuario());
        $stm->execute();
    }
    public function atualizar(ComentarioNoticia $cometario){
        $sql= "UPDATE cometarionoticia SET descricao = :desc WHERE (idcometarionoticia = :id)";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":desc", $cometario->getDescricao());
        $stm->bindValue(":id", $cometario->getIdComentario());
        return $stm->execute();
        
    }
    public function deletar($id) {
        $sql="DELETE FROM cometarionoticia WHERE (idcometarionoticia = :id);";
         $stm = $this->link->prepare($sql); 
            $stm->bindValue(":id",$id);
            return $stm->execute();
    }

}
