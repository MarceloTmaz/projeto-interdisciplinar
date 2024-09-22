<?php
    session_start();
    $id=$_SESSION['usuario_id'];
    $idCometaio=filter_input(INPUT_GET, "idCometario");
    $conteudo= filter_input(INPUT_GET, "desc");
            
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><!-- comment -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head>
    <body>
               <?php     
        if($id>0){
            
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
        <?php }?>
        <form action="./ComentarioNoticiaControle.php" method="get" >
             <label class=" fs-5">Descrição: </label><br><!-- comment -->
             <input type="text" class="form-control" name="descicao" value="<?php echo $conteudo;?>"><br>
             <input type="number"  name="idCometario" value="<?php echo $idCometaio; ?>" hidden="true">
             <input type="submit" class="btn btn-light" name="ref" value="Atualizar">            
        </form>
    </body>
</html>