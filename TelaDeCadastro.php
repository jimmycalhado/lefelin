<?php

if(isset($_POST['submit'])) {

    include_once('TelaConectador.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $datanascimento = $_POST['datanascimento'];

    $result = mysqli_query($conexao, "INSERT INTO cadastro(nome, email, senha, cpf, telefone, datanascimento) 
    VALUES ('$nome', '$email', '$senha', '$cpf', '$telefone', '$datanascimento')");

    header("Location:TelaDeLogin.php");

  }  

?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta nome="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Averia+Serif+Libre:ital@1&family=Bungee+Spice&family=Chango&family=Lato&family=Lobster&family=Oswald:wght@200;300;400&family=Playfair:ital,wght@0,400;1,300&family=Roboto+Condensed:ital,wght@1,300&family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">
        <title>Cadastro</title> 
        <link  href="TelaDeCadastro.css" rel="stylesheet">
    </head>
    <body>
        <form action="TelaDeCadastro.php" method="post">
        <div class="Cadastro">
                <legend><b>Crie sua conta</b></legend>
                 <br><br><br>
        </div>
        <div class="box S1">
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="labelInput">Nome Completo</label>
            </div>
        </div><br>
        <div class="box S2">
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="nome e" class="labelInput">E-mail</label>
            </div>
        </div><br>
        <div class="box S3">
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="nome e" class="labelInput">Senha</label>
            </div>
            </div><br>
        <div class="box S4">
            <div class="inputBox">
                <input type="text" name="cpf" id="cpf" class="inputUser" required  size="14" maxlength="11">
                <label for="nome CPF" class="labelInput">CPF</label>
            </div>
        </div><br>
        <div class="box S5">
            <div class="inputBox">
                <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                <label for="nome t" class="labelInput">Celular</label>
            </div>
        </div><br>
        <div class="box S6">
            <div class="inputBox">
                    <label for="datanascimento"><h3>Data de Aniversário: <input type="date" name="datanascimento" id="datanascimento" class="dn" required></h3></label>
            </div>
        </div><br>
            <input type="submit" name="submit" id="submit" > 
            <img src="gato.png" class="gato g1">
            <img src="gato.png" class="gato g2">
        </form>
    </body>
</html>