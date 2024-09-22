<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of UsuarioDAO
 *
 * @author marcelo
 */
include_once './UniversalConnect.php';
include_once './Usuario.php';

class UsuarioDAO {
     private $link;
    
    public function __construct() {
        $this->link = UniversalConnect::doConnect();
    }
    
    public function inserirUsuario(Usuario $a) {
        
         $sql="insert into usuario (email, senha) values(:em,:senha)";
            
            $stm = $this->link->prepare($sql); 
            $stm->bindValue(":em", $a->getEmail());
            $stm->bindValue(":senha", $a->getSenha());
            return $stm->execute();
            
        
    }
    
    public function doLogin(Usuario $user) {
        try {
            $sql = "SELECT * "
                    . "FROM usuario "
                    . "where email=:nm and senha=:pw";
            
            $stm = $this->link->prepare($sql);
            
            $stm->bindValue(":nm", $user->getEmail());
            $stm->bindValue(":pw", $user->getSenha());
            $stm->execute(); 
            
            
            
            if ($stm->rowCount() > 0) {
               // $_SESSION["id"]=
               // $stm->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuario',[$idusuario,$email,$senha]);
                //$stm->fetch();
                $resultado=$stm->fetch(PDO::FETCH_ASSOC);
                $idusurio=$resultado['idusuario'];
                $email = $resultado['email'];
                $senha = $resultado['senha']; 
                $usuario=new Usuario($idusurio,$email,$senha);
                return $usuario;
         
               // return true;
                //return $stm->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
            
        } catch (Exception $ex) {
            //echo $user->getEmail();
            echo "$ex";
        }
    }
    
    public function buscarUm(Usuario $user) {
        try {
            $sql = "SELECT * "
                    . "FROM usuario "
                    . "where email=:nm ";
            
            $stm = $this->link->prepare($sql);
            
            $stm->bindValue(":nm", $user->getEmail());
            $stm->execute(); 
            
            if ($stm->rowCount() > 0) {
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } else {
                return false;
            }
            
        } catch (Exception $ex) {
            echo "$ex";
        }
    }
    
    public function atualizar(Usuario $user) {
        
            $sql = "UPDATE usuario SET senha=:se  WHERE idusuario = :id;";
            
            $stm = $this->link->prepare($sql);
            $stm->bindValue(":se", $user->getSenha());
            $stm->bindValue(":id", $user->getId());
            return $stm->execute();
    }
    
    public function busca(Usuario $user) {
        
            $sql = "SELECT * "
                    . "FROM usuario "
                    . "where id=:id ";
            
            $stm = $this->link->prepare($sql);
            $stm->bindValue(":id", $user->getId());
           
            $stm->execute(); 
            
             if ($stm->rowCount() > 0) {
               // $_SESSION["id"]=
                $stm->setFetchMode(PDO::FETCH_CLASS,'Usuario');
                return $stm->fetch();
                
                //return $stm->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
    }
}
