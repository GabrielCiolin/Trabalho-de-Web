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


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Sistema</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="index.php?pg=cadastro-usuario">Cadastro de Usuário</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="index.php?pg=clientes-cadastrados">Clientes Cadastrados</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="index.php?pg=boletos-em-aberto">Boletos em Aberto</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="index.php?pg=status-envio">Status de Envio</a>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <label class="mr-3">Olá, <?=$objfunc->fixCharacter($nameUser, 2);?></label>
          <a href="logout.php">SAIR</a>
        </div>
      </div>
    </div>
  </nav>

  <main>
    <div class="container-fluid mt-3">
      <?php
        $pg = "";
        if(isset($_GET['pg']) && !empty($_GET['pg'])){
          $pg = addslashes($_GET['pg']);
        }

        switch($pg){
          case 'cadastro-usuario': require 'pages/cadastro-usuario.php'; break;
          case 'status-envio': require 'pages/status-envio.php'; break;
          case 'clientes-cadastrados': require 'pages/clientes-cadastrados.php'; break;
          case 'boletos-em-aberto': require 'pages/boletos-em-aberto.php'; break;
          case 'consulta-cliente': require 'pages/consulta-registraClientes.php'; break;
          case 'consulta-boleto': require 'pages/consulta-boleto.php'; break;
          case 'consulta-link': require 'pages/consulta-link.php'; break;
          case 'download-boleto': require 'pages/download-boleto.php'; break;
          case 'envio-mensagem': require 'pages/envio-mensagem.php'; break;
          default: require 'pages/home.php';
        }

        
      ?>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>

<?php else: header("Location: login.php"); endif; ?>