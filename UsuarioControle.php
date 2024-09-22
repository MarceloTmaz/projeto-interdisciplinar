<?php
include_once './Usuario.php';
include_once './UsuarioDAO.php';

//class UsuarioControle {
    //put your code here
/*
    try {
    $re= $_GET["te"];
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
*/
    
    $ref = filter_input(INPUT_GET, "ref");
    
    if($ref=="criar"){
        $emal=filter_input(INPUT_GET, "email");
        $senha=filter_input(INPUT_GET, "senha");
        
        $usu=new Usuario(0,$emal,$senha);
        $usuDAO=new UsuarioDAO();
        $b=$usuDAO->inserirUsuario($usu);
        if($b==false){
            echo 'Operação realizada com falha.';         
        } else {
            header("Location: http://localhost/projeto1/index.php");
        }
    }
     if($ref=="login"){
        $emal=filter_input(INPUT_GET, "email");
        $senha=filter_input(INPUT_GET, "senha");
        
        $usu=new Usuario(0,$emal,$senha);
        $usuDAO=new UsuarioDAO();
        $b=$usuDAO->doLogin($usu);
        if($b==false){
            header("Location: http://localhost/projeto1/frmLogin.html");        
        } else {
              // Login bem-sucedido! Você pode armazenar informações na sessão
              session_start();
             $_SESSION['usuario_id'] = $b->getId();
             $_SESSION['email'] = $b->getEmail();
            header("Location: http://localhost/projeto1/index.php");
           // echo $b->getId();
        }
    }elseif ( $ref=="Atualizar") {
        $id=filter_input(INPUT_GET, "idUser");
        $email=filter_input(INPUT_GET, "email");
        $senha=filter_input(INPUT_GET, "senha");
        //$usu=new Usuario(null,$emal,$senha,null,null);
        $usu=new Usuario($id,$email,$senha);
        $usuDAO=new UsuarioDAO();
        $a=$usuDAO->atualizar($usu);
        
        if($a==false){
            echo 'Operação realizada com falha.';         
        } else {
            header("Location:  http://localhost/projeto1/index.php");
        }
        
    }elseif ( $ref=="editar") {

            header("Location:  http://localhost/projeto1/frmUsuarioAtualizar.php");
        
    }elseif($ref=="Encerar sessão"){
        session_start();
        session_destroy();
         header("Location:  http://localhost/projeto1/index.php");
    }
