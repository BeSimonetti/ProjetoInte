<?php
if(isset($_POST['submit'])){


    include "cadastro.class.php";
    include_once "conexao.php";
    
        $u = new Cadastro();
    
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        $u->setEmail($email);
        $u->setSenha($senha);
    
        $u->inserirUsuario();
    
        header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background-color: #480001;
    }
    .telaCad{
        background-color: rgba(0, 0, 0, 0.95);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 50px;
        border-radius: 15px;
        color: white;
        text-align: center;
    }
    .h1Text h1{
        transform: translate(0%, -55%);
        font-size: 42px;
        text-align: center;
        color: white;
    }
    .inputBox{
        margin-bottom: 15px;
        transform: translate(-7%, -20%);
    }
    .inputBox input{
        text-align: center;
        padding: 15px;
        border-radius: 10px;
        border: none;
        outline: none;
        width: 100%;
        
    }
    #submit{
        background-color: orange;
        border: none;
        padding: 15px;
        width: 115%;
        border-radius: 10px;
        color: white;
        font-size: 15px;
        transform: translate(-6%, -20%);
    }
    #submit:hover{
        background-color: orangered;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <form action="cadastro.php" method="POST">
        <div class="telaCad">
            <div class="h1Text">
                <h1>Cadastro</h1>
            </div>
            
            <div class="inputBox">
                <input type="text" placeholder="E-mail" name="email" id="email" required>
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Senha" name="senha" id="senha" required>
            </div>
            <input type="submit" name="submit" id="submit">
        </div>
    </form>
</body>
</html>