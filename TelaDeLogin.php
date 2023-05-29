<?php

include('TelaConectador.php');

if(isset($_POST['email']) || isset ($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo 'Preencha o email';
    }else if(strlen($_POST['senha']) == 0) {
        echo "Preencha a senha";
    }else{
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM cadastro WHERE email = '$email' and senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL");

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            header("Location:TelaPrincipal.html");

        } else {

            echo '<script>alert("Email ou Senha incorretos, tente novamente.")</script>';

        }
        
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta nome="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Averia+Serif+Libre:ital@1&family=Bungee+Spice&family=Chango&family=Lato&family=Lobster&family=Oswald:wght@200;300;400&family=Playfair:ital,wght@0,400;1,300&family=Roboto+Condensed:ital,wght@1,300&family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">
        <title>Login</title> 
        <link  href="TelaDeLogin.css" rel="stylesheet">
    </head>

    <body>
    <form action="" method="post">
        <img class="logo" src="logo_lefelin.png" >
        <div class="fontP">  
            <legend><b>Login</b></legend>
        </div>
        <div class="box  S2">
            <div class="inputBox ">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="nome e" class="labelInput">E-mail</label>
            </div>
        </div>
        <div class="box S1">
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="nome e" class="labelInput">Senha</label>
            </div>
        </div>

        <div class="criar">
            <h3><a href="TelaDeCadastro.php">Clique aqui se não possui cadastro</a></h3>
        </div>
      
        <input type="submit" name="submit" id="submit">
        <img src="gato.png" class="gato g1">
        <img src="gato.png" class="gato g2">
        </form>
    </body>
</html>