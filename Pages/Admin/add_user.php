<?php
session_start();

if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
    header("Location: ./Pages/Login/index.php");
}

include_once '../../Functions/Admin.php';

$adm = new AdminClass(); 

$data = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($data['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h3>ADICIONAR USUARIO</h3>
        <form action="./add_user_helpper.php" method="POST">
            <div>
                <label>NOME</label>
                <input type="text" name="name"  />
            </div>
            <div>
                <label>USERNAME</label>
                <input type="text" name="username"  />
            </div>
            <div>
                <label>E-MAIL</label>
                <input type="email" name="email"  />
            </div>
            <div>
                <label>NIVEL</label>
                <select name="nivel">
                    <option value="null"></option>
                    <option value="admin" >ADMINISTRADOR</option>
                    <option value="user" >USUARIO</option>
                </select>
            </div>
            <div>
                <label>STATUS</label>
                <select name="active">
                    <option value="null"></option>
                    <option value="Y"  >ATIVO</option>
                    <option value="N"  >INATIVO</option>
                </select>
            </div> 
    
            <input type="submit" value="ADCIONAR" />
            <a href="./admin.php">VOLTAR</a>
        </form>
    </body>
    </html>