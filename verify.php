<?php

require 'conexao.php';

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){

    require_once 'class/Usuario.class.php';
    $u = new Usuario();

    $listLogged = $u->logged($_SESSION['idUser']);

    $nameUser = $listLogged['nome'];
}else{
    header("Location: ./pages/login.php");
}

?>
