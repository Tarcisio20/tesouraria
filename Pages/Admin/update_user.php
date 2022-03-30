<?php
session_start();

if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
    header("Location: ./Pages/Login/index.php");
}

require_once '../../Functions/Admin.php';
$adm = new AdminClass();

$dataAdm = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdm['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
}



if(!isset($_GET['id']) && empty($_GET['id']) === ''){
    header("Location: ./admin.php?error='Preciso de um usuario!'");
}



$data = $adm->getUserByID($_GET['id']);

//print_r($data);
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
    <h3>ALTERAR USUARIO</h3>
    <form action="./update_user_helpper.php" method="POST">
        <div>
            <label>NOME</label>
            <input type="text" name="name" value="<?php echo $data['name']; ?>" />
        </div>
        <div>
            <label>USERNAME</label>
            <input type="text" name="username" value="<?php echo $data['username']; ?>" />
        </div>
        <div>
            <label>E-MAIL</label>
            <input type="email" name="email" value="<?php echo $data['email']; ?>" />
        </div>
        <div>
            <label>NIVEL</label>
            <select name="nivel">
                <option></option>
                <option value="admin" <?php if($data['nivel'] === 'admin'){echo 'selected';} ?> >ADMINISTRADOR</option>
                <option value="user" <?php if($data['nivel'] === 'user'){ echo 'selected';} ?> >USUARIO</option>
            </select>
        </div>
        <div>
            <label>STATUS</label>
            <select name="active">
                <option></option>
                <option value="Y" <?php if($data['active'] === 'Y'){ echo 'selected';} ?> >ATIVO</option>
                <option value="N" <?php if($data['active'] === 'N'){ echo 'selected';} ?> >INATIVO</option>
            </select>
        </div>
        <input type="hidden" name="id_user" value="<?php  echo $data['id']; ?>" /> 

        <input type="submit" value="ALTERAR" />
        <a href="./admin.php">VOLTAR</a>
    </form>
</body>
</html>