<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of NoticiaDAO
 *
 * @author marcelo
 */
include_once './UniversalConnect.php';
include_once './Noticia.php';

   
class NoticiaDAO {
    //put your code here 
    private $link;
    
    public function __construct() {
        $this->link = UniversalConnect::doConnect();
    }
    
    public function criar(Noticia $noticia) {
        try {
            $sql="INSERT INTO noticia (descricao, idusuario,idcategoria,idjogos) VALUES ( :desc, :idU,:idC,:idj);";

            $stm = $this->link->prepare($sql); 
            $stm->bindValue(":desc", $noticia->getDescicao());
            $stm->bindValue(":idU", $noticia->getIdUsuario());
            $stm->bindValue(":idC", $noticia->getIdCategoria());
                        $stm->bindValue(":idj", $noticia->getIdJogos());

            return $stm->execute();
        
        } catch (Exception $exc) {
            echo $exc;
        }    
    }
    public function listar($id) {
               try {       
            $sql="SELECT j.nomejogos,  n.idnoticia,n.descricao,n.idusuario,n.idcategoria
                    FROM projentointer.noticia n
                    JOIN projentointer.jogos j ON n.idjogos = j.idjogos
                    where n.idcategoria=:idC;";
            $stm=$this->link->prepare($sql);
            $stm->bindValue(":idC", $id);
            $stm->execute(); 
            
            $noticias = array();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
                $noticia = new Noticia(0,0,0,0,0);
                $noticia->setIdnoticia($row->idnoticia);
                $noticia->setDescicao($row->descricao);
                $noticia->setIdUsuario($row->idusuario);
                $noticia->setIdCategoria($row->idcategoria);
                $noticia->setIdJogos($row->nomejogos);
                // Adicione o objeto Jogo ao vetor
                $noticias[] =$noticia;
            }

            return $noticias;
          
            
        } catch (Exception $ex) {
            echo "$ex";
        }
    }
       public function atualizarJogo(Noticia $noticia){
        $sql= "UPDATE noticia SET descricao = :desc WHERE (idnoticia = :id)";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":desc", $noticia->getDescicao());
        $stm->bindValue(":id", $noticia->getIdnoticia());
        return $stm->execute();
        
    }
    
    public function deletar($id) {
         $sql2="DELETE FROM cometarionoticia WHERE (idnoticia= :id);";
                $stm2 = $this->link->prepare($sql2); 
                   $stm2->bindValue(":id",$id);
                    $stm2->execute();
        $sql="DELETE FROM noticia WHERE (idnoticia = :id);";
        $stm = $this->link->prepare($sql); 
        $stm->bindValue(":id", $id);
        return $stm->execute();
    }
    
    
    public function ultimasNoticias() {
               try {       
            $sql="SELECT j.nomejogos,  n.idnoticia,n.descricao,n.idusuario,n.idcategoria
                    FROM projentointer.noticia n
                    JOIN projentointer.jogos j ON n.idjogos = j.idjogos
        order by n.idnoticia desc;";
            $stm=$this->link->prepare($sql);
            $stm->execute(); 
            
            $noticias = array();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
                $noticia = new Noticia(0,0,0,0,0);
                $noticia->setIdnoticia($row->idnoticia);
                $noticia->setDescicao($row->descricao);
                $noticia->setIdUsuario($row->idusuario);
                $noticia->setIdCategoria($row->idcategoria);
                $noticia->setIdJogos($row->nomejogos);
                // Adicione o objeto Jogo ao vetor
                $noticias[] =$noticia;
            }

            return $noticias;
          
            
        } catch (Exception $ex) {
            echo "$ex";
        }
    }
    
    public function deletarNoticiaCadeiaJogo($idJogo) {
         $sql="SELECT n.idjogos,n.idnoticia
                    FROM projentointer.noticia n
                    where n.idjogos=:id;";
            $stm=$this->link->prepare($sql);
            $stm->bindValue(":id", $idJogo);
            $stm->execute(); 
            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                $noticia = new Noticia(0,0,0,0,0);
                $noticia->setIdJogos($row->idjogos);
                $noticia->setIdnoticia($row->idnoticia);
                 $sql2="DELETE FROM cometarionoticia WHERE (idnoticia= :id);";
                $stm2 = $this->link->prepare($sql2); 
                   $stm2->bindValue(":id",$noticia->getIdnoticia());
                    $stm2->execute();
            }

    }
    public function deletarNoticiaCadeiacategoria($idJogo) {
         $sql="SELECT n.idjogos,n.idnoticia,n.idcategoria
                    FROM projentointer.noticia n
                    where n.idcategoria=:id;";
            $stm=$this->link->prepare($sql);
            $stm->bindValue(":id", $idJogo);
            $stm->execute(); 
            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                $noticia = new Noticia(0,0,0,0,0);
                $noticia->setIdJogos($row->idjogos);
                $noticia->setIdnoticia($row->idnoticia);
                $noticia->setIdCategoria($row->idcategoria);
                 $sql2="DELETE FROM cometarionoticia WHERE (idnoticia= :id);";
                $stm2 = $this->link->prepare($sql2); 
                   $stm2->bindValue(":id",$noticia->getIdnoticia());
                    $stm2->execute();
            }
            $sql2="delete from noticia where idcategoria=:id;";
             $stm2=$this->link->prepare($sql2);
            $stm2->bindValue(":id", $idJogo);
            $stm2->execute(); 
    }

    //select * from projentointer.noticia n
        //order by n.idnoticia desc;
}
