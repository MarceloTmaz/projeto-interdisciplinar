<?php
    session_start();
     $id=0;
    if (isset($_SESSION['usuario_id'])) {
    // A sessão está ativa, faça o que for necessário
         $id = $_SESSION['usuario_id'];
    }
    $email=$_SESSION['email'];

    if($id==0){
       header("Location: http://localhost/projeto1/frmLogin.html");
    }
    
    
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><!-- comment -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
    </head>
    <body>
          <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">>
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">"nome do site"</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <form action="./JogoControle.php" method="get">
                <input type="submit" class="btn btn-dark" name="ref" value="listar">
            </form>
        </li>
        <li class="nav-item">
            <form action="./CategoriaControle.php" method="get">
                <input type="submit" class="btn btn-dark" name="ref" value="listar">
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
         <li class="nav-item">
             <form action="./perfilUsuario.php" method="get">
                <input type="submit" class="btn btn-dark" name="ref" value="perfil">
            </form>      
        </li>
      </ul>
    </div>
  </div>
</nav>
<p>Email</p>
        <p><?php echo $email ?></p>
        
        <form action="UsuarioControle.php" method="get" >
            <input type="submit" class="btn btn-light" name="ref" value="editar">
            
        </form>
        <form action="UsuarioControle.php" method="get" >
            <input type="submit" class="btn btn-light" name="ref" value="Encerar sessão">
            
        </form>
    </body>
</html>
