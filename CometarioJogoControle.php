<?php
include_once './CometarioJogo.php';
include_once './CometarioJogoDAO.php';
include_once './Jogo.php';

 $ref = filter_input(INPUT_GET, "ref");

if($ref=="Comentar"){
    
    
    $descricao= filter_input(INPUT_GET, "descricao");
    $idJogo=filter_input(INPUT_GET, "jogo");
    $idUsuario= filter_input(INPUT_GET, "idUser");
    $cometario=new CometarioJogo(0,$descricao,$idJogo,$idUsuario);
    $cometarioDao=new CometarioJogoDAO();
   
    
    $b=$cometarioDao->criar($cometario);
      /*  if($b==false){
            echo 'Operação realizada com falha.';         
        } else {*/
            header("Location: http://localhost/projeto1/index.php");
        //}
}elseif ($ref == "ListarCometario") {
    $idJogo= filter_input(INPUT_GET, "idJogo");
    header("Location:  http://localhost/projeto1/CometarioJogoListar.php?idJogo=$idJogo");
}elseif($ref=="CriarCometario"){
    $idJogo= filter_input(INPUT_GET, "idJogo");
    //echo $idcate;
   header("Location: http://localhost/projeto1/CometarioJogoCriar.php?idJogo=$idJogo");
}elseif($ref=="Editar"){
        $idCometario= filter_input(INPUT_GET, "idCometario");
        $desc= filter_input(INPUT_GET, "desc");
        
        header("Location: http://localhost/projeto1/CometarioJogoAtualizar.php?idCometario=$idCometario&desc=$desc");
}elseif($ref=="Atualizar"){

    $desci= filter_input(INPUT_GET, "descicao");
    $idCometario= filter_input(INPUT_GET, "idCometario");
    
    $cometario=new CometarioJogo($idCometario,$desci,0,0);
    $dao=new CometarioJogoDAO();
    $b=$dao->atualizar($cometario);
    //echo  $idnoticia;
    
    if($b==false){
            echo 'Operação realizada com falha.';         
    } else {
            header("Location: http://localhost/projeto1/index.php");
    }
}elseif($ref=="Deletar"){
    $id= filter_input(INPUT_GET, "idCometario");
    
    $dao=new CometarioJogoDAO();
    $b=$dao->deletar($id);
     if($b==false){
            echo 'Operação realizada com falha.';         
    } else {
            header("Location: http://localhost/projeto1/index.php");
    }
}elseif($ref=="Mais comentado"){
    header("Location: http://localhost/projeto1/CometarioJogoMais.php");     
}