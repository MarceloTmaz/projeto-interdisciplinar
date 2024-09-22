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
    $dao=new EventoDao();
    $b=$dao->um($id);
    session_start();
     $idU=0;
    if (isset($_SESSION['usuario_id'])) {
    // A sessão está ativa, faça o que for necessário
         $idU = $_SESSION['usuario_id'];
    }
    echo '<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><!-- comment -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head><body>';
                      if($idU>0){
            
            ?>
        
                <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">>
          <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Chick Games</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="./JogoControle.php" method="get">
                        <input type="submit" class="btn btn-dark" name="ref" value="Listar Jogos">
                    </form>
                </li>
                <li class="nav-item">
                    <form action="./CategoriaControle.php" method="get">
                        <input type="submit" class="btn btn-dark" name="ref" value="Listar Categorias">
                    </form>      
                </li>
                <li class="nav-item">
                    <form action="./EventoControle.php" method="get">
                        <input type="submit" class="btn btn-dark" name="ref" value="listarEventos">
                    </form>      
                </li>
                <li>
                        <form action="./CometarioJogoControle.php" method="get" >
                     <input type="submit" class="btn btn-dark" name="ref" value="Mais comentado">            
                </form>
                 </li>
                
                <li  class="nav-item">     
                    <form action="./FavoritoControle.php" method="get" >
                    <input type="submit"  class="btn btn-dark" name="ref" value="Jogo mais favoritado">            
                    </form> 
                 </li>
                 <li  class="nav-item">
         <form action="./NoticiaControle.php" method="get" >
             <input type="submit"  class="btn btn-dark" name="ref" value="Ultimas Noticias">            
        </form>
             </li>
             <li  class="nav-item">
                    <form action="./FavoritoControle.php" method="get" >
                        <input type="submit"  class="btn btn-dark" name="ref" value="Favoritos">            
                   </form>
             </li>
             <li class="nav-item">
                 <form action="./FavoritoControle.php" method="get" >
             <input type="submit"  class="btn btn-dark" name="ref" value="Noticias de Jogos Favoritos">            
        </form>
             </li>
                 <li class="nav-item">
                     <form action="./perfilUsuario.php" method="get">
                        <input type="submit" class="btn btn-dark" name="ref" value="perfil">
                    </form>      
                </li>
                
              </ul>
            </div>
          </div>
        </nav>
        <?php }else{?>
              <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">>
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Chick Games</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <form action="./JogoControle.php" method="get">
                <input type="submit" class="btn btn-dark" name="ref" value="Listar Jogos">
            </form>
        </li>
        <li class="nav-item">
            <form action="./CategoriaControle.php" method="get">
                <input type="submit" class="btn btn-dark" name="ref" value="Listar Categorias">
            </form>      
        </li>
        <li class="nav-item">
            <form action="./EventoControle.php" method="get">
                <input type="submit" class="btn btn-dark" name="ref" value="listarEventos">
            </form>      
        </li>
              <li>
                        <form action="./CometarioJogoControle.php" method="get" >
                     <input type="submit" class="btn btn-dark" name="ref" value="Mais comentado">            
                </form>    
                </li>
                
        <li  class="nav-item">     
             <form action="./FavoritoControle.php" method="get" >
             <input type="submit"  class="btn btn-dark" name="ref" value="Jogo mais favoritado">            
             </form> 
          </li>
             <li  class="nav-item">
         <form action="./NoticiaControle.php" method="get" >
             <input type="submit"  class="btn btn-dark" name="ref" value="Ultimas Noticias">            
        </form>
             </li>
        <li class="nav-item">
            <form action="./frmLogin.html" method="get">
                <input type="submit" class="btn btn-dark" name="ref" value="login">
            </form>    
        </li>
        <li class="nav-item">
            <form action="./frmUsuario.html" method="get">
                <input type="submit" class="btn btn-dark" name="ref" value="cadastrar">
            </form>      
        </li>

      </ul>
    </div>
  </div>
</nav>
        <?php } 
     foreach ($b as $li) {
         echo '<span class="d-block p-2 bg-dark text-white">';
         echo "Nome: ";
         echo $li->getNome();
         echo '</span>';
          echo '<span class="d-block p-2 bg-dark text-white">';
         echo "Data: ";
         echo $li->getData();
         echo '</span>';
          echo '<span class="d-block p-2 bg-dark text-white">';
         echo "Descrição: ";
         echo $li->getDescricao();
         echo '</span>';
          echo '<span class="d-block p-2 bg-dark text-white">';
         echo "local: ";
         echo $li->getLocal();
         echo '</span>';
             
       
     }
    
    
}