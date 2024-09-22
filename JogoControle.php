<?php
include_once './Jogo.php';
include_once './JogoDAO.php';
include_once './FavoritoDao.php';
include_once './Favorito.php';
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


    $ref = filter_input(INPUT_GET, "ref");
    
    if($ref=="criar"){
        $nome=filter_input(INPUT_GET, "nomeJogo");
        $descricao=filter_input(INPUT_GET, "descricao");
        $idusuario= filter_input(INPUT_GET, "idUser");
        $jogo=new Jogo($nome,$descricao,$idusuario);
        $jogoDao=new JogoDAO();
        $b=$jogoDao->inserirJogo($jogo);
        if($b==false){
            echo 'Operação realizada com falha.';         
        } else {
            header("Location: http://localhost/projeto1/index.php");
        }
    }elseif($ref=="Atualizar"){
        $nome=filter_input(INPUT_GET, "nomeJogo");
        $descricao=filter_input(INPUT_GET, "descricao");
        $idusuario= filter_input(INPUT_GET, "idUser");
        $idjogo= filter_input(INPUT_GET, "idjogo");
        $jogo=new Jogo($nome,$descricao,$idusuario);
        $jogo->setId($idjogo);
        $jogoDao=new JogoDAO();
        $b=$jogoDao->atualizarJogo($jogo);
        if($b==false){
            echo 'Operação realizada com falha.';         
        } else {
            header("Location: http://localhost/projeto1/JogoListar.php");
        }
    }
    elseif($ref=="Listar Jogos"){

         header("Location: http://localhost/projeto1/JogoListar.php");
    }elseif($ref=="Editar"){
        $idjogo= filter_input(INPUT_GET, "idjogo");
        $nome=filter_input(INPUT_GET, "nome");
        $descricao=filter_input(INPUT_GET, "desc");
        echo $idjogo;
         $jogo=new Jogo(0,0,0);
        $jogo->setId($idjogo);

            header("Location: http://localhost/projeto1/JogoAtualizar.php?idJogo=$idjogo&nome=$nome&desc=$descricao");
    }
    elseif ($ref=="deletar") {
        $idjogo= filter_input(INPUT_GET, "idjogo");
        $jogo=new Jogo(0,0,0);
        $jogo->setId($idjogo);
        $jogoDao=new JogoDAO();
        $b=$jogoDao->deletar($idjogo);
        if($b==false){
            echo "erro";
        }else{
            header("Location: http://localhost/projeto1/JogoListar.php");
        }
    }
    


