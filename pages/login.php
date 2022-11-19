<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../styles/style.css">
    <title>Trabalho de Web</title>

</head>

<body>

    <div class="container" >
        <form class="form" action="../logar.php" method="POST">
            <div class="conteudo-login">
                    <div class="campo-user">
                        <input type="text" id="usuario" name="usuario" placeholder="Insira o nome do Usuário">
                    </div>

                    <div class="campo-password">
                        <input type="password" id="senha" name="senha"  placeholder= "Insira a Senha">
                    </div>

                    <div class="btn-login">
                        <input type="submit" value="Login in">
                    </div>
            </div>
        </form>
    </div>



</body>
</html>