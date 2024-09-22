<?php

include_once './Favorito.php';
include_once './Jogo.php';
include_once './FavoritoDao.php';
include_once './Noticia.php';
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


    $ref = filter_input(INPUT_GET, "ref");
    if($ref=="Favoritar"){
        $idjogo= filter_input(INPUT_GET, "idJogo");
    session_start();
    $id=0;
    if (isset($_SESSION['usuario_id'])) {
    // A sessão está ativa, faça o que for necessário
         $id = $_SESSION['usuario_id'];
    } else {
        // A sessão não está ativa, trate o erro aqui
         header("Location: http://localhost/projeto1/frmLogin.html");
        echo "Erro: Ninguém está conectado.";
    }
        $fav=new Favorito($idjogo,$id);
        
        $dao=new FavoritoDao();
        $b=$dao->criar($fav);
        /*
        if($b==false){
            echo'erro';
        }else{
           echo" ok";
            
        }*/
        header("Location: http://localhost/projeto1/JogoListar.php");
        
    }elseif($ref=="Favoritos"){
          header("Location: http://localhost/projeto1/FavoritoListar.php");
            
    }elseif($ref=="Remover"){
        $idU= filter_input(INPUT_GET, "idU");
        $idjogo= filter_input(INPUT_GET, "idJogo");

        $dao=new FavoritoDao;
        $f=new Favorito($idjogo,$idU);
        $b=$dao->deletar($f);
         if($b==false){
             header("Location: http://localhost/projeto1/FavoritoListar.php");
        }else{
            header("Location: http://localhost/projeto1/FavoritoListar.php");
            
        }
    }elseif($ref=="Noticias de Jogos Favoritos"){
        header("Location: http://localhost/projeto1/FavoritoNoticia.php");
        
    }elseif($ref=="Jogo mais favoritado"){
        header("Location: http://localhost/projeto1/FavoritoMais.php");

    }
    
    

