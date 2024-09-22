<?php

include_once './Evento.php';
include_once './EventoDao.php';


 $ref = filter_input(INPUT_GET, "ref");

 if($ref=="criar"){
     $nome= filter_input(INPUT_GET, "nome");
     $desc= filter_input(INPUT_GET, "descricao");
     $data= filter_input(INPUT_GET, "data");
     $local= filter_input(INPUT_GET, "local");
     $idU= filter_input(INPUT_GET, "idUser");
     $dao=new EventoDao();
     $evento=new Evento(0,$nome,$data,$local,$desc,$idU);
     $b=$dao->criar($evento);
     if($b==false){
         echo 'erro';
     }else{
         header("Location: http://localhost/projeto1/EventoListar.php");     
     }
 }elseif ($ref == "listarEventos") {
     header("Location: http://localhost/projeto1/EventoListar.php");
}elseif($ref=="CriarEvento"){
    //echo $idcate;
   header("Location: http://localhost/projeto1/EventoCriar.php");
}elseif($ref=="Editar"){
        $idE= filter_input(INPUT_GET, "id");
        $nome= filter_input(INPUT_GET, "nome");
        $desc= filter_input(INPUT_GET, "descricao");
        $data= filter_input(INPUT_GET, "data");
        $local= filter_input(INPUT_GET, "local");
        
        header("Location: http://localhost/projeto1/EventoAtualizar.php?id=$idE&desc=$desc&nome=$nome&data=$data&local=$local");
}elseif($ref=="Atualizar"){

   $nome= filter_input(INPUT_GET, "nome");
     $desc= filter_input(INPUT_GET, "descricao");
     $data= filter_input(INPUT_GET, "data");
     $local= filter_input(INPUT_GET, "local");
     //$idU= filter_input(INPUT_GET, "idUser");
     $id= filter_input(INPUT_GET, "id");
     $dao=new EventoDao();
     $evento=new Evento($id,$nome,$data,$local,$desc,0);
     $b=$dao->atualizar($evento);
    //echo  $idnoticia;
    
    if($b==false){
            echo 'Operação realizada com falha.';         
    } else {
            header("Location: http://localhost/projeto1/index.php");
    }
}elseif($ref=="Deletar"){
    $id= filter_input(INPUT_GET, "id");
    
    $dao=new EventoDao();
    $b=$dao->deletar($id);
     if($b==false){
            echo 'Operação realizada com falha.';         
    } else {
            header("Location: http://localhost/projeto1/index.php");
    }
}elseif ($ref=="detalhe") {
    $id= filter_input(INPUT_GET, "id");
    header("Location: http://localhost/projeto1/EventoDetalhe.php?id=$id");
    
}