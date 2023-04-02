<?php 
require_once("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/Icons.png">
    <link rel="stylesheet" type="text/css" href="css/rascunho2.css">
    <title>Login</title>
</head>

<body>
    <div id="direita">
        <img src="img/Home.jpg">
    </div>   
    
    <div id="esquerda">
        
        <section>
            <h1><img src="img/Icons.png" alt="">
            <a href="?a=home"><span>Nutri</span>Health</a></h1> 
            <h3>Entre com sua conta</h3>
            <fieldset>
            <legend>
                <label for="cUser">Login</label>
            </legend>
            <form method="post" action="autenticar.php">
                <input type="text" maxlength="50" name="email" id="cUser">
                </fieldset>
                <fieldset>
                    <legend>
                        <label for="cPas">Senha</label>
                    </legend>
                    <input type="text"  name="senha" id="cPas">
                </fieldset>
                <button type="submit">Entrar</button>
            </form>
            <h2>Esqueci minha senha</h2>
        </section>
    </div>
</body>
</html>