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
    }
   
        $dao=new FavoritoDao();
        $b=$dao->listarMaisFavoritos();
        ?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><!-- comment -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head>
    <body><?php
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
            echo 'Operação realizada com falha.';         
        } else {
            if ($b) {
               // echo $b[0]->getNome();

            echo "<table border=1 class=table table-dark table-striped";
            echo '<trclass="table-dark">';
            echo '<td class="table-dark  fs-5 ">Nome</td><td class="  fs-5 table-dark">dscricao</td><td class=" fs-5 table-dark"colspan=4>Ação</td>';
            echo "</tr>";


            foreach ($b as $li) {
                echo '<td class="table-dark  fs-5">' . $li->getNome() . "</td>";
echo '<td class="table-dark  fs-5">' . $li->getDescricao() . "</td>";
                
                if($li->getIdUsuario()==$idU){
                echo '<td  class="table-dark  fs-5 > <form action="./JogoControle.php" method="get" >
             <input type="number" value="';
                echo  $li->getId() ;
                echo '" name="idjogo" hidden="true">
             <input type="submit" class="btn btn-light" name="ref" value="Editar">            
        </form> </td>';
                echo '<td  class="table-dark  fs-5> <form action="./JogoControle.php" method="get" >
             <input type="number" value="';
                echo  $li->getId() ;
                echo '" name="idjogo" hidden="true">
             <input type="submit" class="btn btn-light" name="ref" value="deletar">            
        </form> </td>';
                }
                $daoF=new FavoritoDao();
                $f=new Favorito($li->getId(),$idU);
                $bu=$daoF->busscarUm($f);
                if($bu==null){
                        echo '<td class="table-dark"> <form action="./FavoritoControle.php" method="get" >
                     <input type="number" value="';
                        echo  $li->getId() ;
                        echo '" name="idJogo" hidden="true">
                     <input type="submit" class="btn btn-light" name="ref" value="Favoritar">            
                </form> </td>';
            }else{
                        echo '<td class="table-dark"> <form action="./FavoritoControle.php" method="get" >
                 <input type="number" value="';
                    echo  $li->getId() ;
                    echo '" name="idJogo" hidden="true">';
                    echo '<input type="number" value="';
                    echo $idU;
                    echo  '" name="idU" hidden="true">
                 <input type="submit" class="btn btn-light" name="ref" value="Remover">            
            </form> </td>';
                }
                
                
                 echo '<td class="table-dark"> <form action="./CometarioJogoControle.php" method="get" >
             <input type="number" value="';
                echo  $li->getId() ;
                echo '" name="idJogo" hidden="true">
             <input type="submit" class="btn btn-light" name="ref" value="ListarCometario">            
        </form> </td>';
                echo "</tr>";
            }
            echo "</table>";
            } else {
                echo 'Nenhum registro retornado.';
            }
        }
        echo '</body></html>';