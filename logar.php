<?php 

if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require 'conexao.php';
    require 'class/Usuario.class.php';

    $u = new Usuario();

    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);
    // var_dump($u->login($usuario, $senha));

    if ($u->login($usuario, $senha) == true){
        if(isset($_SESSION['idUser'])){

            header("Location: index.php");
        }else{
            header("Location: ./pages/login.php");
        }
    }else{
        header("Location: ./pages/login.php");
       
    }

    
}else{
    header("Location: ./pages/login.php");
}


?>