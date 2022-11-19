<?php

require_once 'Functions.class.php';

class RegisterUser {

    private $con;
    private $objfunc;
    //Atributos do usuário
    private $id;
    private $usuario;
    private $senha;
    private $nome;
    private $celular;
    private $email;

    public function __construct() {
        global $pdo;
        $this->objfunc = new Functions();
    }

    public function __set($attribute, $value) {
        $this->$attribute = $value;
    }

    public function __get($attribute) {
        return $this->$attribute;
        
    }

    public function querySelection($data) {
        try {
            global $pdo;

            $this->id = $this->objfunc->base64($data, 2); //Decodifica o id
            $cst = $pdo->prepare("SELECT `id`, `name`, `senha` FROM `usuario` WHERE `id` = :id;");
            $cst->bindParam(":id", $this->id, PDO::PARAM_INT); //Parâmetro para evitar SQL Inject
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $e) {
            return 'error '.$e->getMessage();
        }
    }

    public function querySelect() {
        try {
            global $pdo;

            $cst = $pdo->prepare("SELECT `id`, `nome`, `celular`, `email` FROM `usuario`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $e) {
            return 'error '.$e->getMessage();
        }
    }

    public function queryInsert($data) {
        try {
            global $pdo;

            $this->usuario = $data['usuario'];
            $this->senha = sha1($data['senha']);  //Criptografando a senha
            $this->nome = $this->objfunc->fixCharacter($data['nome'], 1); //Tratando caracteres para inserir no bando de dados
            $this->celular = $data['celular'];
            $this->email = $data['email'];

            $cst = $pdo->prepare("INSERT INTO `usuario` (`usuario`, `senha`, `nome`, `celular`, `email`) VALUES (:usuario, :senha, :nome, :celular, :email);");
            $cst->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":celular", $this->celular, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            if($cst->execute()) {
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $e) {
            return 'error '.$e->getMessage();
        }
    }

    public function queryUpdate($data) {
        try {
            global $pdo;

            $this->id = $this->objfunc->base64($data['id'], 2);
            $this->usuario = $data['usuario'];
            $this->senha = sha1($data['senha']);  //Criptografando a senha
            $this->nome = $this->objfunc->fixCharacter($data['nome'], 1); //Tratando caracteres para inserir no bando de dados
            $this->celular = $data['celular'];
            $this->email = $data['email'];

            $cst = $pdo->prepare("UPDATE `usuario` SET `usuario` = :usuario, `nome` = :nome, `celular` = :celular, `email` = email WHERE `id` = :id;");
            $cst->bindParam(":id", $this->id, PDO::PARAM_INT);
            $cst->bindParam(":usuario", $this->usuario, PDO::PARAM_STR);
            $cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $cst->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $cst->bindParam(":celular", $this->celular, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            if($cst->execute()) {
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $e) {
            return 'error ' .$e->getMessage();
        }
    }

    public function queryDelete($data) {
        try {
            global $pdo;

            $this->id = $this->objfunc->base64($data, 2);
            $cst = $pdo->prepare("DELETE FROM `usuario` WHERE `id` = :id;");
            $cst->binParam(":id", $this->id, PDO::PARAM_INT);
            if($cst->execute()) {
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $e) {
            return 'error ' .$e->getMessage();
        }
    }

}


?>