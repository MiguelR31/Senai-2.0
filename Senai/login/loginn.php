<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedOption = $_POST['fill']; // Obtém o valor da opção selecionada no menu suspenso

    // Processa a opção selecionada
    switch ($selectedOption) {
        case 'usuarioo':
            
            if(isset($_POST['email']) || isset($_POST['senha'])) {

                if(strlen($_POST['email']) == 0) {
                    echo "";
                } else if(strlen($_POST['senha']) == 0) {
                    echo "";
                } else {
            
                    $email = $mysqli->real_escape_string($_POST['email']);
                    $senha = $mysqli->real_escape_string($_POST['senha']);
            
                    $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            
                    $quantidade = $sql_query->num_rows;
            
                    if($quantidade == 1) {
                        
                        $usuario = $sql_query->fetch_assoc();
            
                        if(!isset($_SESSION)) {
                            session_start();
                        }
            
                        $_SESSION['id'] = $usuario['id'];
                        $_SESSION['nome'] = $usuario['nome'];
            
                        header("Location: usuario/hsenai.html");
            
                    } else {
                        echo "Falha ao logar! E-mail ou senha incorretos";
                    }
            
                }
            
            }

            

            break;
        case 'ADM':
          
            if(isset($_POST['email']) || isset($_POST['senha'])) {

                if(strlen($_POST['email']) == 0) {
                    echo "";
                } else if(strlen($_POST['senha']) == 0) {
                    echo "";
                } else {
            
                    $email = $mysqli->real_escape_string($_POST['email']);
                    $senha = $mysqli->real_escape_string($_POST['senha']);
            
                    $sql_code = "SELECT * FROM adm WHERE email = '$email' AND senha = '$senha'";
                    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            
                    $quantidade = $sql_query->num_rows;
            
                    if($quantidade == 1) {
                        
                        $usuario = $sql_query->fetch_assoc();
            
                        if(!isset($_SESSION)) {
                            session_start();
                        }
            
                        $_SESSION['id'] = $usuario['id'];
                        $_SESSION['nome'] = $usuario['nome'];
            
                        header("Location: ADM/ADM.php");
            
                    } else {
                        echo "Falha ao logar! E-mail ou senha incorretos";
                    }
            
                }
            
            }
            break;
       
        default:
            echo "Opção inválida";
    }
}




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container">
       <h1>Login</h1>
       <hr>
       <form action="" method="POST">
        <br>

       <label>E-mail</label>
       <input class="caixa" type="text" name="email">
       <br> <br> <br> 

       <label>Senha</label>
       <input class="caixa" type="password" name="senha">
       <br> <br> <br> <br> 
       <label for="fill">Escolha uma opção:</label>
       <select id="fill" name="fill">
         <option value="usuarioo">Usuario</option>
         <option value="ADM">ADM</option>
       </select>
         <br> <br>
       <button class="submit" type="submit">Entrar</button>
       
        
       </form>
    </div>
     
    
</body>
</html>