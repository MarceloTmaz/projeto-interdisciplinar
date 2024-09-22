<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of FavoritoDao
 *
 * @author marcelo
 */
include_once './UniversalConnect.php';
include_once './Jogo.php';
include_once './Favorito.php';
class FavoritoDao {
    //put your code here
        private $link;
    
    public function __construct() {
        $this->link = UniversalConnect::doConnect();
    }
    public function listar($id) {
        try{
            $sql="SELECT j.idjogos, j.nomejogos, j.nomejogos,j.descricao,j.idusuario 
                    FROM jogos j
                    JOIN favoritos f ON j.idjogos = f.idjogos
                    WHERE f.idusuario = :id;";
             $stm=$this->link->prepare($sql);
                $stm->bindValue(":id",$id);
                $stm->execute();  
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
            return $jogos;
        } catch (Exception $ex) {
            echo "$ex";
        }
    }
    
     public function listarMaisFavoritos() {
        try{
            $sql="select j.idjogos,j.nomejogos,j.descricao,j.idusuario, COUNT(*) qtd from projentointer.jogos j
                    JOIN projentointer.favoritos c on c.idjogos=j.idjogos
                    group by j.idjogos
                    order by qtd desc 
                    limit 5;";
             $stm=$this->link->prepare($sql);
                $stm->execute();  
            $jogos = array();
            while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                $jogo = new Jogo(0,0,0);
                $jogo->setId($row->idjogos);
                $jogo->setNome($row->nomejogos);
                $jogo->setDescricao($row->descricao);
                $jogo->setIdUsuario($row->idusuario);
                $jogos[] =$jogo;
            }
            return $jogos;
        } catch (Exception $ex) {
            echo "$ex";
        }
    }
    
    public function criar(Favorito $favorito) {
        $sql="INSERT INTO favoritos (idusuario, idjogos) VALUES (:idU, :idJ);";
         $stm=$this->link->prepare($sql);
         $stm->bindValue(":idU",$favorito->getIdUsuario());
        $stm->bindValue(":idJ",$favorito->getIdJogo());
                $stm->execute(); 
    }
     public function deletar(Favorito $favorito) {
        $sql="delete from favoritos where idusuario=:idU and idjogos=:idJ;";
         $stm=$this->link->prepare($sql);
         $stm->bindValue(":idU",$favorito->getIdUsuario());
        $stm->bindValue(":idJ",$favorito->getIdJogo());
        return $stm->execute(); 
    }
     public function busscarUm(Favorito $favorito) {
        $sql="Select *from projentointer.favoritos where idusuario=:idU and idjogos=:idJ;";
         $stm=$this->link->prepare($sql);
         $stm->bindValue(":idU",$favorito->getIdUsuario());
        $stm->bindValue(":idJ",$favorito->getIdJogo());
        $stm->execute(); 
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
        
    }
    
    public function listarNoticia($id) {
        try{
            $sql="SELECT j.nomejogos,  n.idnoticia,n.descricao,n.idusuario,n.idcategoria
                    FROM projentointer.noticia n
                    JOIN projentointer.jogos j ON n.idjogos = j.idjogos
                    join projentointer.favoritos f on f.idjogos=j.idjogos 
                    where f.idusuario = :id;";
             $stm=$this->link->prepare($sql);
                $stm->bindValue(":id",$id);
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
    
}
