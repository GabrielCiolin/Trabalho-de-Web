<?php 
require 'verify.php';
require_once './class/Functions.class.php';
require_once './class/RegisterUser.class.php';

$objfunc = new Functions();

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])):?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
 <?php require 'pages/navbar.php'; ?>
  
  <main>
    <div class="container-fluid mt-3">
      <?php
        $pg = "";
        if(isset($_GET['pg']) && !empty($_GET['pg'])){
          $pg = addslashes($_GET['pg']);
        }

        switch($pg){
          case 'cadastro-usuario': require 'pages/cadastro-usuario.php'; break;
          // case 'listagem-usuario': require 'pages/listagem-usuario.php'; break;
          default: require 'pages/home.php';
        }

        
      ?>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php else: header("Location: ./pages/login.php"); endif; ?>