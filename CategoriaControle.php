<?php
include_once './Categoria.php';
include_once './CategoriaDAO.php';
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

 $ref = filter_input(INPUT_GET, "ref");
    
    if($ref=="criar"){
        
        
        $nome=filter_input(INPUT_GET, "nomeCate");
        $id=filter_input(INPUT_GET, "idUser");
        $cate=new Categoria($nome,$id);
        $categoriadao=new CategoriaDAO();
        $b=$categoriadao->inserircategoria($cate);
        if($b==false){
            echo 'Operação realizada com falha.';         
        } else {
            header("Location: http://localhost/projeto1/CategoriaListar.php");
        }
    }elseif($ref=="Atualizar"){
        $nome=filter_input(INPUT_GET, "nomeCate");
        $idcategoria= filter_input(INPUT_GET, "idCate");
        $cate=new Categoria($nome,0);
        $cate->setId($idcategoria);
        $categoriadao=new CategoriaDAO();
        $b=$categoriadao->atualizarcategoria($cate);
        if($b==false){
            echo 'Operação realizada com falha.';         
        } else {
            #echo $nome;
            #echo $cate->getId();
            header("Location: http://localhost/projeto1/CategoriaListar.php");
        }
    }
    elseif($ref=="Listar Categorias"){
        header("Location: http://localhost/projeto1/CategoriaListar.php");
    }
    elseif($ref=="Editar"){
        $idcate= filter_input(INPUT_GET, "idcate");
        #echo $idcate;
        $desc= filter_input(INPUT_GET, "desc");
         header("Location: http://localhost/projeto1/CategoriaAtualizar.php?idCatecoria=$idcate&desc=desktop");
    }elseif($ref=="Deletar"){
        $idcategoria= filter_input(INPUT_GET, "idcate");
        $categoriadao=new CategoriaDAO();
        $b=$categoriadao->deletar($idcategoria);
         if($b==false){
            echo 'Operação realizada com falha.';         
        } else {
            #echo $nome;
            #echo $cate->getId();
            header("Location: http://localhost/projeto1/index.php");
        }
    }/*
    elseif($ref == "lisarNoticia"){
         $idcate= filter_input(INPUT_GET, "idcate");
         header("Location: http://localhost/projeto1/NoticiaControle.php?idCategoria=$idcate&ref=listar");
    
}*/

