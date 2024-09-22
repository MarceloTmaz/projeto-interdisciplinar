<?php

include_once './Noticia.php';
include_once './NoticiaDAO.php';
include_once './Jogo.php';
include_once './JogoDAO.php';
    $ref = filter_input(INPUT_GET, "ref");
   // echo $ref;
if($ref=="criar"){

    $desci= filter_input(INPUT_GET, "descricao");
    $idcate= filter_input(INPUT_GET, "idCategotia");
    $idUser= filter_input(INPUT_GET,"idUser");
    $idj= filter_input(INPUT_GET, "jogo");
    $d=new JogoDAO();
    $jogo=$d->selectOne($idj);
    $noticia=new Noticia(0,$desci,$idUser,$idcate,$jogo->getId());
    $dao=new NoticiaDAO();
    
    $b=$dao->criar($noticia);
    #echo 'cheguei';
        if($b==false){
            echo 'Operação realizada com falha.';         
        } else {
            header("Location: http://localhost/projeto1/index.php");
        }
}elseif($ref=="listarNoticia"){
      $idcate= filter_input(INPUT_GET, "idcate");
   header("Location: http://localhost/projeto1/NoticiaListar.php?idcate=$idcate");
    
}elseif($ref=="CriarNoticia"){
    $idcate= filter_input(INPUT_GET, "idCate");
    //echo $idcate;
   header("Location: http://localhost/projeto1/NoticiaCriar.php?idCategoria=$idcate");
}elseif($ref=="Atualizar"){

    $desci= filter_input(INPUT_GET, "descicao");
    $idnoticia= filter_input(INPUT_GET, "idNo");
     $idj= filter_input(INPUT_GET, "jogo");
    $d=new JogoDAO();
    $jogo=$d->selectOne($idj);
    $noticia=new Noticia($idnoticia,$desci,0,0,$jogo->getId());
    $dao=new NoticiaDAO();
    $b=$dao->atualizarJogo($noticia);
    //echo  $idnoticia;
    
   
    
    if($b==false){
            echo 'Operação realizada com falha.';         
    } else {
            header("Location: http://localhost/projeto1/index.php");
    }
} elseif($ref=="Editar"){
        $idnoticia= filter_input(INPUT_GET, "idNo");
        $desc= filter_input(INPUT_GET, "desc");
        
        header("Location: http://localhost/projeto1/NoticiaAtualizar.php?idnoticia=$idnoticia&desc=$desc");
}elseif($ref=="Deletar"){
     $idnoticia= filter_input(INPUT_GET, "id");
        $dao=new NoticiaDAO();
        $b=$dao->deletar($idnoticia);
         if($b==false){
            echo 'Operação realizada com falha.';         
        } else {
            #echo $nome;
            #echo $cate->getId();
            header("Location: http://localhost/projeto1/index.php");
        }
    
}elseif ($ref=="Ultimas Noticias") {
               header("Location: http://localhost/projeto1/NoticiaUltimas.php");
 
}
