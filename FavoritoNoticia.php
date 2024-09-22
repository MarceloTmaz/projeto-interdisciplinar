<?php
include_once './Favorito.php';
include_once './Jogo.php';
include_once './FavoritoDao.php';
include_once './Noticia.php';
 session_start();
        $idU=0;
        if (isset($_SESSION['usuario_id'])) {
        // A sessão está ativa, faça o que for necessário
             $idU = $_SESSION['usuario_id'];
        } else {
            // A sessão não está ativa, trate o erro aqui
             header("Location: http://localhost/projeto1/frmLogin.html");
            echo "Erro: Ninguém está conectado.";
        }
        $dao=new FavoritoDao();
        $b=$dao->listarNoticia($idU);
        //echo $id;
                echo ' <html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><!-- comment -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head>';
        echo '<body>';
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
 
 
        if($b==false){
            echo 'Nenhum registro retornado.';        
        } else {
            if ($b) {
                  echo "<table border=1 class=table table-dark table-striped";
            echo '<tr class="table-dark">';
            echo '<td class=" fs-5 table-dark">Nome </td><td class=" fs-5 table-dark">Jogo </td><td class=" fs-5 table-dark" colspan=3>Ação</td>';
            echo "</tr>";


            foreach ($b as $li) {

                echo '<tr class="table-dark">';
                echo '<td class=" fs-5 table-dark">' . $li->getDescicao() . "</td>";
                echo '<td class=" fs-5 table-dark">' . $li->getIdJogos() . "</td>";
                if($idU==$li->getIdUsuario()){
                echo '<td class="table-dark"> <form action="./NoticiaControle.php" method="get" >
             <input type="number" value="';
                echo  $li->getIdnoticia() ;
                echo '" name="idNo" hidden="true">
                    <input type="text" value="';
                echo  $li->getDescicao() ;
                echo '" name="desc" hidden="true">
             <input type="submit" class="btn btn-light" name="ref" value="Editar">            
        </form> </td>';
                echo '<td class="table-dark"> <form action="./NoticiaControle.php" method="get" >
             <input type="number" value="';
                echo  $li->getIdnoticia() ;
                echo '" name="id" hidden="true">
             <input type="submit" class="btn btn-light" name="ref" value="Deletar">            
        </form> </td>';
                }
                  echo '<td class="table-dark"> <form action="./ComentarioNoticiaControle.php" method="get" >
             <input type="number" value="';
                echo  $li->getIdnoticia() ;
                echo '" name="idNoticia" hidden="true">
             <input type="submit" class="btn btn-light" name="ref" value="ListarCometario">            
        </form> </td>';
                echo "</tr>";
            }
            echo "</table>";
            } else {
                echo 'Nenhum registro retornado.';
            }
            
        }