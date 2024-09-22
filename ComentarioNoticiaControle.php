<?php
include_once './ComentarioNoticia.php';
include_once './ComentarioNoticiaDAO.php';


 $ref = filter_input(INPUT_GET, "ref");

if($ref=="Comentar"){
    
    
    $descricao= filter_input(INPUT_GET, "descricao");
    $idN=filter_input(INPUT_GET, "noticia");
    $idUsuario= filter_input(INPUT_GET, "idUser");
    $cometario=new ComentarioNoticia(0,$descricao,$idN,$idUsuario);
    $cometarioDao=new ComentarioNoticiaDAO();
    $b=$cometarioDao->criar($cometario);
      /*  if($b==false){
            echo 'Operação realizada com falha.';         
        } else {*/
            header("Location: http://localhost/projeto1/index.php");
        //}
}elseif ($ref == "ListarCometario") {
    $idN= filter_input(INPUT_GET, "idNoticia");
    header("Location: http://localhost/projeto1/ComentarioNoticiaListar.php?idNoticia=$idN");
}elseif($ref=="CriarCometario"){
    $idN= filter_input(INPUT_GET, "idNoticia");
    //echo $idcate;
   header("Location: http://localhost/projeto1/ComentarioNoticiaCriar.php?idN=$idN");
}elseif($ref=="Editar"){
        $idCometario= filter_input(INPUT_GET, "idCometario");
        $desc= filter_input(INPUT_GET, "desc");
        
        header("Location: http://localhost/projeto1/ComentarioNoticiaAtualizar.php?idCometario=$idCometario&desc=$desc");
}elseif($ref=="Atualizar"){

    $desci= filter_input(INPUT_GET, "descicao");
    $idCometario= filter_input(INPUT_GET, "idCometario");
    
    $cometario=new ComentarioNoticia($idCometario,$desci,0,0);
    $dao=new ComentarioNoticiaDAO();
    $b=$dao->atualizar($cometario);
    //echo  $idnoticia;
    
    if($b==false){
            echo 'Operação realizada com falha.';         
    } else {
            header("Location: http://localhost/projeto1/index.php");
    }
}elseif($ref=="Deletar"){
    $id= filter_input(INPUT_GET, "idCometario");
    
    $dao=new ComentarioNoticiaDAO();
    $b=$dao->deletar($id);
     if($b==false){
            echo 'Operação realizada com falha.';         
    } else {
            header("Location: http://localhost/projeto1/index.php");
    }
}