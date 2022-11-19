<?php

class Usuario {


    public function login($usuario, $senha){
        global $pdo;
        
        $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("usuario", $usuario);
        // $sql->bindValue("senha", $senha);
        $sql->bindValue("senha", sha1($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

            $_SESSION['idUser'] = $dado['id'];
            return true;
        }else{
            return false;
        }
    }

    public function logged($id){
        global $pdo;

        $array = array();

        $sql = "SELECT nome FROM usuario WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();  //$array = $sql->fetchAll();  Caso queira pegar todos os dados
        }

        return $array;
    }
}




?>