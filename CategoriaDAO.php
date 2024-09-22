<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of CategoriaDAO
 *
 * @author marcelo
 */
include_once './UniversalConnect.php';
include_once './Categoria.php';
include_once './NoticiaDAO.php';
class CategoriaDAO {
    //put your code here
    private $link;
    
    public function __construct() {
        $this->link = UniversalConnect::doConnect();
    }
    
    public function inserircategoria(Categoria $categotia) {
        try {
            $sql="INSERT INTO categoria ( nome,idusuario) VALUES (:desc, :idU);";

            $stm = $this->link->prepare($sql); 
            $stm->bindValue(":desc", $categotia->getDescricao());
            $stm->bindValue(":idU",$categotia->getIdU());
            return $stm->execute();
        
        } catch (Exception $exc) {
            echo $exc;
        }    
    }
    public function selectAll() {
        try {     
        $sql="SELECT * FROM categoria;";
        $stm=$this->link->prepare($sql);
        $stm->execute();
        $categoria=array();
        while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
                // Criar um objeto Jogo com os valores da linha
                $cate = new Categoria(0,0);
                $cate->setId($row->idcategoria);
                $cate->setDescricao($row->nome);
                $cate->setIdU($row->idusuario);
                // Adicione o objeto Jogo ao vetor
                $categoria[] =$cate;
            }

            return $categoria;
        } catch (Exception $ex) {
            echo "$ex";
        }
    }
    public function atualizarcategoria(Categoria $categotia) {
        try {
            $sql="UPDATE categoria SET nome = :nome WHERE (idcategoria = :id);";

            $stm = $this->link->prepare($sql); 
            $stm->bindValue(":nome", $categotia->getDescricao());
            $stm->bindValue(":id",$categotia->getId());
            return $stm->execute();
        
        } catch (Exception $exc) {
            echo $exc;
        }    
    }
    public function deletar($id) {
        $dao=new NoticiaDAO();
        $dao->deletarNoticiaCadeiacategoria($id);
        $sql="DELETE FROM categoria WHERE (idcategoria = :id);";
         $stm = $this->link->prepare($sql); 
            $stm->bindValue(":id",$id);
            return $stm->execute();
    }

    
}
